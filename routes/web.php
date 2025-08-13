<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


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

//Route::get('/', function () {
  //  return view('welcome');
//});

// トップページで投稿一覧表示
Route::get('/', [PostsController::class, 'index'])->name('home');


//投稿一覧表示機能
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

//投稿新規作成機能
Route::get('/posts/create', [PostsController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [PostsController::class, 'store'])->middleware('auth');


//投稿編集・更新機能
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{id}/update', [PostsController::class, 'update'])->name('posts.update');
});

//投稿削除機能
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

//投稿検索機能

//認証後のダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
