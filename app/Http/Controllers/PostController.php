<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tags;

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
        $kategori = Category::all();
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post,
            "kategori" => $kategori,
        ]);
    }
}
