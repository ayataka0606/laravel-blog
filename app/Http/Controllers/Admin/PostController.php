<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostPostRequest;
use App\Http\Requests\PostPutRequest;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        return view("admin/post/index",compact("posts"));
    }
    public function create(): View
    {
        $categories = Category::all();
        return view("admin/post/create",compact("categories"));
    }
    public function store(PostPostRequest $request): RedirectResponse
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->keywords = $request->keywords;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->published = $request->published;
        $post->save();
        return redirect(route("admin.post.index"))
            ->with("message",$post->title."を追加しました。");
    }
    public function edit(Post $post): View
    {
        $categories = Category::all();
        return view("admin/post/edit",compact("post","categories"));
    }
    public function update(PostPutRequest $request, Post $post): RedirectResponse
    {
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->keywords = $request->keywords;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->published = $request->published;
        $post->update();
        return redirect(route("admin.post.index"))
            ->with("message",$post->title."を編集しました。");
    }
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect(route("admin.post.index"))
            ->with("message",$post->title."を削除しました。");
    }
}
