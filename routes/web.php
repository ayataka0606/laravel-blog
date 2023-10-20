<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\User\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//サイトマップ関係
Route::get("sitemap.xml",[SitemapController::class,"index"])->name("sitemap.index");
Route::get("sitemap/posts.xml",[SitemapController::class,"posts"])->name("sitemap.posts");

//フィード関係
Route::get("feed.atom",[FeedController::class,"index"])->name("feed.index");


//ログイン関係
Route::get("admin/login",[AuthenticatedSessionController::class,"create"])->name("admin.login.create")->middleware("guest:admin");
Route::post("admin/login",[AuthenticatedSessionController::class,"store"])->name("admin.login.store")->middleware("guest:admin");
Route::post("admin/logout",[AuthenticatedSessionController::class,"destroy"])->name("admin.login.destroy")->middleware("auth:admin");

//カテゴリ関係
Route::get("admin/category",[CategoryController::class,"index"])->name("admin.category.index")->middleware("auth:admin");
Route::get("admin/category/create",[CategoryController::class,"create"])->name("admin.category.create")->middleware("auth:admin");
Route::post("admin/category/store",[CategoryController::class,"store"])->name("admin.category.store")->middleware("auth:admin");
Route::get("admin/category/{category}/edit",[CategoryController::class,"edit"])->name("admin.category.edit")->middleware("auth:admin");
Route::put("admin/category/{category}",[CategoryController::class,"update"])->name("admin.category.update")->middleware("auth:admin");
Route::delete("admin/category/{category}",[CategoryController::class,"destroy"])->name("admin.category.destroy")->middleware("auth:admin");

//投稿関係
Route::get("admin/post",[PostController::class,"index"])->name("admin.post.index")->middleware("auth:admin");
Route::get("admin/post/create",[PostController::class,"create"])->name("admin.post.create")->middleware("auth:admin");
Route::post("admin/post/store",[PostController::class,"store"])->name("admin.post.store")->middleware("auth:admin");
Route::get("admin/post/{post}/edit",[PostController::class,"edit"])->name("admin.post.edit")->middleware("auth:admin");
Route::put("admin/post/{post}",[PostController::class,"update"])->name("admin.post.update")->middleware("auth:admin");
Route::delete("admin/post/{post}",[PostController::class,"destroy"])->name("admin.post.destroy")->middleware("auth:admin");
Route::get("",[BlogController::class,"index"])->name("blog.index");
Route::get("blog/{slug}",[BlogController::class,"show"])->name("blog.show");
Route::get("category",[BlogController::class,"category"])->name("blog.category");
Route::get("search",[BlogController::class,"search"])->name("blog.search");

//画像関係
Route::get("admin/image",[ImageController::class,"index"])->name("admin.image.index")->middleware("auth:admin");
Route::post("admin/image",[ImageController::class,"upload"])->name("admin.image.upload")->middleware("auth:admin");

//アバウト関係
Route::get("about",[AboutController::class,"index"])->name("about.index");

?>