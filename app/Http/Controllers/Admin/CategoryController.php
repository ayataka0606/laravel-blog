<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryPostRequest;
use App\Http\Requests\CategoryPutRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::orderBy("updated_at","DESC")->get();
        return view("admin/category/index", compact("categories"));
    }
    public function create(): View
    {
        return view("admin/category/create");
    }
    public function store(CategoryPostRequest $request): RedirectResponse
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $category->save();

        return redirect(route("admin.category.index"))
            ->with("message",$category->name."を追加しました。");
    }
    public function edit(Category $category): View
    {
        return view("admin/category/edit",compact("category"));
    }
    public function update(CategoryPutRequest $request,Category $category): RedirectResponse
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $category->update();
        return redirect(route("admin.category.index"))
            ->with("message",$category->name."を変更しました。");
    }
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect(route("admin.category.index"))
            ->with("message",$category->name."を削除しました。");
    }
}
