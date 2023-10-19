<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::with("category")->get();
        return view("user/blog/index",compact("posts"));
    }
    public function show(Request $request): View
    {
        $slug = $request->slug;
        $post = Post::where("slug","=",$slug)->first();
        return view("user/blog/show",compact("post"));
    }
    public function category(): View
    {
        $categories = Category::all();
        $posts = Post::with("category")->orderBy("category_id")->get();
        return view("user/blog/category",compact("categories","posts"));
    }
}
