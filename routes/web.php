<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile'); // view profile

Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create']); // create profile
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);  // edit profile 

Route::post('/profile/postCreate', [App\Http\Controllers\ProfileController::class, 'postCreate']); // create post ->name('profile.postCreate');
Route::post('/profile/{id}/postEdit', [App\Http\Controllers\ProfileController::class, 'postEdit']); // edit post ->name('profile.postEdit');

Route::resource('post', App\Http\Controllers\PostController::class);

Route::post('/post/showPosts', [App\Http\Controllers\PostController::class, 'showPosts']);  // show all posts 
