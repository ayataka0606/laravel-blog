<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(): View
    {
        $comments = Comment::where("published","=","0")->get();
        return view("admin/comment/index",compact("comments"));
    }
    public function update(Comment $comment): RedirectResponse
    {
        $comment->published = true;
        $comment->update();
        return redirect(route("admin.comment.index"))
            ->with("message","コメントを承認しました。");
    }
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect(route("admin.comment.index"))
            ->with("message","コメントを削除しました。");
    }
}
