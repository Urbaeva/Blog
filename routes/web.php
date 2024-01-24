<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\Liked\LikedController;
use App\Http\Controllers\Personal\PersonalController;
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


Route::group(['namespace'=>'Main'], function (){
    Route::get('/', [IndexController::class, 'index'])->name('main.index');
});

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function (){
    Route::get('/', [PersonalController::class, 'index'])->name('personal.main.index');
    Route::group(['prefix' => 'liked'], function (){
        Route::get('/', [LikedController::class, 'index'])->name('personal.liked.index');
        Route::delete('/{post}', [LikedController::class, 'delete'])->name('personal.liked.delete');
    });
    Route::group(['prefix' => 'comment'], function (){
        Route::get('/', [CommentController::class, 'index'])->name('personal.comment.index');
        Route::get('/{comment}', [CommentController::class, 'edit'])->name('personal.comment.edit');
        Route::patch('/{comment}', [CommentController::class, 'update'])->name('personal.comment.update');
        Route::delete('/{comment}', [CommentController::class, 'delete'])->name('personal.comment.delete');
    });
});


