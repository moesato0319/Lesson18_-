<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;

//アクセス時ログイン画面
Route::get('/', function () {
    return redirect()->route('login');
});

// 認証必須のルート
Route::middleware(['auth'])->group(function () {

    // 投稿一覧
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

    // 新規投稿
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    // 編集
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

    // 削除
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

// Breeze のプロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
