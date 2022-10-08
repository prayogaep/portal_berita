<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tags;
use App\Models\Category;
use App\Models\PostTags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' =>  'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/post-image';
            $file->move($destinationPath,$fileName);
            $validatedData['image'] = $fileName;
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $post = Post::create($validatedData);
        foreach ($request->tags as $key => $value) {
            $cek = Tags::where('name', $value)->first();
            if (!$cek) {
                $tags = new Tags;
                $tags->name = $value;
                $tags->slug = Str::slug($value);
                $tags->save();

                $post_tags = new PostTags;
                $post_tags->post_id = $post->id;
                $post_tags->tags_id = $tags->id;
                $post_tags->save();
            } else {
                $post_tags = new PostTags;
                $post_tags->post_id = $post->id;
                $post_tags->tags_id = $cek->id;
                $post_tags->save();
            }
        }



        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);

        $cari = PostTags::where('post_id', $post->id)->count();
        if ($cari > 0) {
            $cari->delete();
        }
        foreach ($request->tags as $key => $value) {
            $tags = new Tags;
                $tags->name = $value;
                $tags->slug = Str::slug($value);
                $tags->save();
            $post_tags = new PostTags;
            $post_tags->post_id = $post->id;
            $post_tags->tags_id = $tags->id;
            $post_tags->save();
        }

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        if ($post->image != null) {
            unlink(public_path("post-image/" . $post->image));
        }
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
