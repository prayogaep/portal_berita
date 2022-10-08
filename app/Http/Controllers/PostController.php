<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function index()
    {
        $title= '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        $kategori = Category::all();
        $tags = Tags::all();
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "kategori" => $kategori,
            "tags" => $tags,
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        $posts = Post::with('comments')->where('id', $post->id)->first();
        $kategori = Category::all();
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $posts,
            "kategori" => $kategori,
        ]);
    }

    public function ebook()
    {
        if (request()->search) {
            $cari = request()->search;
            $ebooks = Ebook::where('file_upload', 'like', "%$cari%")->paginate(20)->withQueryString();
        } else {
            $ebooks = Ebook::paginate(20)->withQueryString();
        }


        return view('ebook', [
            "title" => "E-books",
            "active" => 'ebook',
            "ebooks" => $ebooks,

        ]);
    }

    public function download($id)
    {
        $find = base64_decode($id);
        $ebook = Ebook::find($find);
        $file = public_path()."/ebook/$ebook->file_upload";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, $ebook->file_upload,$headers);
    }
}
