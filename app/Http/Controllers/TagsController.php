<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        if (request()->tags == TRUE) {
            $key = base64_decode(request()->tags);
            $tag = Tags::where('name', $key)->first();
            $tags= Tags::with(['posts' => function($query) {
                $query->with(['post' => function($query2) {
                    $query2->with(['category', 'author']);
                }]);
            }])->find($tag->id);
            // dd($tags);
        } else {
            $tags = Tags::paginate(12)->withQueryString();
        }
        return view('tags', [
            'title' => 'Post Tags',
            'active' => 'tags',
            'tags' => $tags
        ]);
    }
}
