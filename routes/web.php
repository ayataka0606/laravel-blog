<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\FeedController;

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

//タグ関係
Route::get("admin/tag",[TagController::class,"index"])->name("admin.tag.index")->middleware("auth:admin");
Route::get("admin/tag/create",[TagController::class,"create"])->name("admin.tag.create")->middleware("auth:admin");
Route::post("admin/tag/store",[TagController::class,"store"])->name("admin.tag.store")->middleware("auth:admin");
Route::get("admin/tag/{tag}/edit",[TagController::class,"edit"])->name("admin.tag.edit")->middleware("auth:admin");
Route::put("admin/tag/{tag}",[TagController::class,"update"])->name("admin.tag.update")->middleware("auth:admin");
Route::delete("admin/tag/{tag}",[TagController::class,"destroy"])->name("admin.tag.destroy")->middleware("auth:admin");

//投稿関係
Route::get("admin/post",[PostController::class,"index"])->name("admin.post.index")->middleware("auth:admin");
Route::get("admin/post/create",[PostController::class,"create"])->name("admin.post.create")->middleware("auth:admin");
Route::post("admin/post/store",[PostController::class,"store"])->name("admin.post.store")->middleware("auth:admin");
Route::get("admin/post/{post}/edit",[PostController::class,"edit"])->name("admin.post.edit")->middleware("auth:admin");
Route::put("admin/post/{post}",[PostController::class,"update"])->name("admin.post.update")->middleware("auth:admin");
Route::delete("admin/post/{post}",[PostController::class,"destroy"])->name("admin.post.destroy")->middleware("auth:admin");
Route::get("",[BlogController::class,"index"])->name("blog.index");
Route::get("blog/{slug}",[BlogController::class,"show"])->name("blog.show");

//コンタクト関係
Route::get("contact",[ContactController::class,"index"])->name("contact.index");
Route::post("contact/confirm",[ContactController::class,"confirm"])->name("contact.confirm");
Route::post("contact/thanks",[ContactController::class,"thanks"])->name("contact.thanks");
Route::get("admin/contact",[AdminContactController::class,"index"])->name("admin.contact.index")->middleware("auth:admin");
Route::get("admin/contact/{contact}",[AdminContactController::class,"show"])->name("admin.contact.show")->middleware("auth:admin");
Route::delete("admin/contact/{contact}",[AdminContactController::class,"destroy"])->name("admin.contact.destroy")->middleware("auth:admin");

?>