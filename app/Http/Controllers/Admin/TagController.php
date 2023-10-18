<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Tag;
use App\Http\Requests\TagPostRequest;
use App\Http\Requests\TagPutRequest;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();
        return view("admin/tag/index", compact("tags"));
    }
    public function create(): View
    {
        return view("admin/tag/create");
    }
    public function store(TagPostRequest $request): RedirectResponse
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->keywords = $request->keywords;
        $tag->description = $request->description;
        $tag->save();

        return redirect(route("admin.tag.index"))
            ->with("message",$tag->name."を追加しました。");
    }
    public function edit(Tag $tag): View
    {
        return view("admin/tag/edit",compact("tag"));
    }
    public function update(TagPutRequest $request,Tag $tag): RedirectResponse
    {
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->keywords = $request->keywords;
        $tag->description = $request->description;
        $tag->update();
        return redirect(route("admin.tag.index"))
            ->with("message",$tag->name."を変更しました。");
    }
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect(route("admin.tag.index"))
            ->with("message",$tag->name."を削除しました。");
    }
}
