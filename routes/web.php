<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// LOGIN REGISTER CONTROLLERS

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');

Route::post('login/submit',  [LoginController::class, 'submit'])->name('login.submit');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');

Route::post('register/submit', [RegisterController::class, 'store'])->name('register.store');


// USER CONTROLLERS

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// PROFILE CONTROLLERS

Route::get('profile/{id}', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');

Route::get('/edit-data/{id}', [ProfileController::class, 'edit_post'])->middleware('auth');

// POST CONTROLLERS 

Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('post.index');

Route::post('/create_post', [PostController::class, 'store'])->name('post.store');

Route::post('/edit_post', [PostController::class, 'update'])->name('post.edit');

Route::get('/post/{id}/{unique_id}', [PostController::class, 'show'])->middleware('auth')->name('post.view');

Route::get('/post_vote/{post_id}/{up_or_down_vote}', [PostController::class, 'vote'])->middleware('auth')->name('post.vote');

// Route::get('/post/{id}', [PostController::class, 'upvote'])->middleware('auth');

// Route::get('/postd/{id}', [PostController::class, 'downvote'])->middleware('auth');



Route::post('/comment', [PostController::class, 'comment'])->name('post.comment');

Route::get('/comment-onload/{id}', [PostController::class, 'comment_onload'])->name('post.comment-onload');

Route::get('/save/{id}', [PostController::class, 'save_post'])->name('save.post');