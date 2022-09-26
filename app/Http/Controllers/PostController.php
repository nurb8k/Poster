<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        $allPosts = Post::all();
        $categories = Category::all();
        return view('posts.index', ['posts' => $allPosts, 'categories' => $categories]);
    }

    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $comments = Comment::all()->where('post_id', $post->id)->sortBy('created_at');


        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Request $request, Post $post)
    {

        $post->update([
            'title' => $request->title,
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function postsByCategory(Category $category)
    {
        $posts = $category->posts;

        return view('posts.index', ['posts' => $posts, 'categories' => Category::all()]);
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id);
    }

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
        return redirect()->route('posts.show',[$comment->post_id]);
    }

}
