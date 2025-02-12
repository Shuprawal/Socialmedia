<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('logged')->group(function (){
    Route::get('/auth/user/login',[UserController::class,'showLogin'])->name('loginUser');
    Route::post('/auth/user/login',[UserController::class,'checkLogin'])->name('checkLogin');
    Route::post('/auth/user',[UserController::class,'store'])->name('registerUser');
});

Route::get('/auth/user',[UserController::class,'show'])->name('newUser');

Route::get('/auth/user/logout',[UserController::class,'logout'])->name('logoutUser');

Route::middleware('user')->group(function (){

    Route::get('/auth/user/dashboard',[UserController::class,'userDashboard'])->name('userDashboard');
    Route::resource('posts',PostController::class);
    Route::resource('tags',TagController::class);
    Route::resource('profile',ProfileController::class);
    Route::get('/search',[PostController::class,'search'])->name('post.search');
    Route::post('/search',[PostController::class,'search'])->name('post.search');
    Route::resource('user',UserController::class);

});
//Route::get('/auth/userlist',[UserController::class,'index'])->name('userList');name



