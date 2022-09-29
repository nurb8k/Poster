<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {
        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id'),
        ]);
        return redirect()->route('posts.show', $request->input('post_id'));

    }

    public function editComment(Comment $comment)
    {
        return view('posts.editComment', ['comment' => $comment]);
    }


    public function updateComment(Request $request, Comment $comment)
    {

        $comment->update([
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.show', [$comment->post_id]);
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id);
    }


}
