<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Baza dannix сактайды
    public function createComment(Request $request)
    {

        $validated =$request->validate([
            'content' => 'required',
            'post_id' => 'required|numeric|exists:posts,id'
        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('message','comment is created');
//        return redirect()->route('posts.show', $request->input('post_id'));
    }

    public function editComment(Comment $comment)
    {
        return view('posts.editComment', ['comment' => $comment]);
    }


    public function updateComment(Request $request, Comment $comment)
    {
        // Бд бар коммент озгерту ушын
        $comment->update([
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.show', [$comment->post_id]);
    }

    // Удалить етеын метод
// Вюшка(form (content) (id) ) -> Route -> Controller (logic (удалить,изменить)) -> виющка
    public function destroyComment(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id);

    }


}
