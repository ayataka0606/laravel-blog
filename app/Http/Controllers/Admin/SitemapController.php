<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SitemapController extends Controller
{
    public function index() {
        return response()->view("sitemap/index")->header("Content-Type","text/xml");
    }
    public function posts() {
        $posts = Post::where("published","=","1")->orderBy("updated_at","DESC")->get();
        return response()->view("sitemap/posts",compact("posts"))->header("Content-Type","text/xml");
    }
}
