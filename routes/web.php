<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SavedController;

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

Route::get('recipe-generator', [GeneratorController::class, 'ingredientsForm'])->name('generator.form.index');
Route::post('recipe-generator/submit', [GeneratorController::class, 'ingredientsFormSubmit'])->name('generator.form.submit');
Route::get('recipe-generator/show', [GeneratorController::class, 'ingredientsFormShow'])->name('generator.form.show');

//GENERATOR RESOURCES
Route::get('generator', [GeneratorController::class, 'index'])->name('generator.index');

Route::get('recipe/{recipe_name}/{id}', [RecipeController::class, 'show'])->name('recipe.show');


// ANDITO UNG MGA CONTROLLERS para sa gagawin

// eto para maview ung SAVED POST PAGE - in progress
Route::get('saved', [SavedController::class, 'index'])->name('saved.index');

// eto para maview ung specific post (AKA ung READ MORE PAGE) - in progress
Route::get('/post/{unique_id}', [PostController::class, 'show'])->name('post.view');

// eto para sa CREATE POST PAGE - in progress
Route::get('create-post', [PostController::class, 'create_post'])->name('post.create');

// eto para sa VIEW PROFILE PAGE - in progress
Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.index');



// LOGIN REGISTER CONTROLLERS

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');

Route::post('login/submit',  [LoginController::class, 'submit'])->name('login.submit');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');

Route::post('register/submit', [RegisterController::class, 'store'])->name('register.store');

Route::get('auth/{service}', [GithubController::class, 'redirectToGithub'])->name('service.register');

Route::get('auth/{service}/callback', [GithubController::class, 'handleGithubCallback'])->name('service.login');

// USER CONTROLLERS

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// PROFILE CONTROLLERS

Route::get('/edit-data/{id}', [ProfileController::class, 'edit_post'])->middleware('auth');

// INDEX // LANDING PAGE CONTROLLERS

Route::get('/', [NavigationController::class, 'index'])->name('navigation.index');

// POST CONTROLLERS 

Route::get('/home', [PostController::class, 'index'])->name('post.index');

Route::post('/create_post', [PostController::class, 'store'])->name('post.store');

Route::post('/edit_post', [PostController::class, 'update'])->name('post.edit');


Route::get('/post_vote/{post_id}/{up_or_down_vote}', [PostController::class, 'vote'])->middleware('auth')->name('post.vote');

// Route::get('/post/{id}', [PostController::class, 'upvote'])->middleware('auth');

// Route::get('/postd/{id}', [PostController::class, 'downvote'])->middleware('auth');


Route::post('/comment', [PostController::class, 'comment'])->name('post.comment');

Route::get('/comment-onload/{id}', [PostController::class, 'comment_onload'])->name('post.comment-onload');

Route::get('/save/{id}', [PostController::class, 'save_post'])->name('save.post');


