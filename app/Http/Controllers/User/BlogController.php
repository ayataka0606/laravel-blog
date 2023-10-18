<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentPostRequest;
use App\Models\Comment;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view("user/blog/index",compact("posts","comments"));
    }
    public function show(Request $request): View
    {
        $slug = $request->slug;
        $post = Post::where("slug","=",$slug)->first();
        $comments = Comment::where([["post_id","=",$post->id],["published","=","1"]])->get();
        return view("user/blog/show",compact("post","comments"));
    }
    public function store(CommentPostRequest $request): RedirectResponse
    {
        $slug = $request->slug;
        $post = Post::where("slug","=",$slug)->first();
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect("/blog/$slug")
            ->with("message","コメントありがとうございます。コメントが承認されるまでお待ちください。");
    }
}
