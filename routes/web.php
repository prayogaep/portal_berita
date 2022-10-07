<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CommentController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\TagsController;
use App\Models\Tags;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'] )->middleware('auth');
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Prayoga Erlangga Putra",
        "email" => "prayoga@gmail.com",
        "image" => "prayoga.jpg"
    ]);
})->middleware('auth');



Route::get('/posts', [PostController::class, 'index'])->middleware('auth');

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show'])->middleware('auth');

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
})->middleware('auth');
Route::get('/ebooks', [PostController::class, 'ebook'])->middleware('auth');

Route::get('/tags', [TagsController::class, 'index'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout_get']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard',
function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/cekSlug', [DashboardPostController::class, 'cekSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/ebook', EbookController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');

Route::post('/comment/{id}', [CommentController::class, 'store']);
Route::get('/comment/{id}', [CommentController::class, 'destroy']);
Route::get('/downloadEbook/{id}', [PostController::class, 'download']);
// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });
