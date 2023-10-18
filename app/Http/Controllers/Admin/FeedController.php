<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    public function index() {
        $posts = Post::orderBy("updated_at","desc")->take(10)->get();
        return response()->view("feed/index",compact("posts"))->header("Content-Type","text/xml");
    }
}
