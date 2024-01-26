<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\Post\PostController;
use App\Http\Controllers\Post\Comment\CommentController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\Like\LikeController;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Post'], function (){
    Route::get('/', [IndexController::class, 'index'])->name('post.index');
    Route::get('/{post}/get', [IndexController::class, 'show'])->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function (){
        Route::post('/', [CommentController::class, 'store'])->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function (){
        Route::post('/', [LikeController::class, 'store'])->name('post.like.store');
    });
});

Route::group(['prefix' => 'categories'], function (){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');


    Route::group(['prefix' => '{category}/posts'], function (){
        Route::get('/', [PostController::class, 'index'])->name('category.post.index');
    });
});



