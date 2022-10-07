<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $rules = [
            'comment' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => $validatedData['comment'],
        ]);
        Alert::success('Success', 'Comment was sent!');
        return redirect("/posts/$request->slug");
    }

    public function destroy($id)
    {
        $find = base64_decode($id);
        $comment = Comment::find($find);
        $post = Post::find($comment->post_id);
        $comment->delete();
        Alert::success('Success', 'Comment deleted!');
        return redirect("/posts/$post->slug");
    }
}
