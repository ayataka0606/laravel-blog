<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::with("category")->where("published","=","1")->get();
        return view("user/blog/index",compact("posts"));
    }
    public function show(Request $request): View
    {
        $slug = $request->slug;
        $post = Post::where([["slug","=",$slug],["published","=","1"]])->with("image")->first();
        $converter = new GithubFlavoredMarkdownConverter();
        $htmlContent = $converter->convert($post->content);
        return view("user/blog/show",compact("post","htmlContent"));
    }
    public function category(): View
    {
        $categories = Category::all();
        $posts = Post::with("category")->orderBy("category_id")->where("published","=","1")->get();
        return view("user/blog/category",compact("categories","posts"));
    }
    public function search(Request $request): View
    {
        $keyword = $request->query("keyword");
        $posts = Post::where([["content","LIKE","%$keyword%"],["published","=","1"]])->get();
        return view("user/blog/search",compact("posts","keyword"));
    }
}
