<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::with("category")->where("published","=","1")->orderBy("updated_at","DESC")->get();
        return view("user/blog/index",compact("posts"));
    }
    public function show(Request $request): View
    {
        $slug = $request->slug;
        $post = Post::where([["slug","=",$slug],["published","=","1"]])->with("image")->first();
        if(isEmpty($post)){
            abort(404);
        }
        Log::info("ブログが参照されました。ID=".$post->id);
        $converter = new GithubFlavoredMarkdownConverter();
        $htmlContent = $converter->convert($post->content);
        return view("user/blog/show",compact("post","htmlContent"));
    }
    public function category(): View
    {
        $categories = Category::all();
        $posts = Post::with("category")->orderBy("category_id")->orderBy("updated_at")->where("published","=","1")->get();
        return view("user/blog/category",compact("categories","posts"));
    }
    public function search(Request $request): View
    {
        $keyword = $request->query("keyword");
        $posts = Post::where([["content","LIKE","%$keyword%"],["published","=","1"]])->orderBy("updated_at","DESC")->get();
        return view("user/blog/search",compact("posts","keyword"));
    }
}
