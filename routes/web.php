<?php

use App\Http\Livewire\Pages\AuthPage\Signup;
use App\Http\Livewire\Pages\MainPage\MainPage;
use App\Http\Livewire\Pages\RecipeGeneratorPages\GeneratorOnePage\GeneratorOne;
use App\Http\Livewire\Pages\RecipeGeneratorPages\GeneratorTwoPage\GeneratorTwo;
use App\Http\Livewire\Pages\SavedItemsPage\SavedItems;
use App\Http\Livewire\Pages\RecipeFeedPage\RecipeFeed;
use App\Http\Livewire\Pages\ReadMorePage\ReadMore;
use App\Http\Livewire\Pages\NewsFeedPage\NewsFeed;
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
use App\Http\Controllers\StatusController;

use App\Http\Controllers\AdminController\AdminContentManagementController;
use App\Http\Controllers\AdminController\AdminUserManagementController;
use App\Http\Controllers\AdminController\AdminLoginRegisterController;
use App\Http\Controllers\AdminController\AdminDashboardController;
use App\Http\Controllers\AdminController\RecipeApprovalController;


use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
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

//recipe 1

Route::post('recipe-generator/submit', [GeneratorController::class, 'ingredientsFormSubmit'])->name('generator.form.submit');


//GENERATOR RESOURCES

Route::get('recipe/{recipe_name}/{id}', [RecipeController::class, 'show'])->name('recipe.show');


// ANDITO UNG MGA CONTROLLERS para sa gagawin

// eto para maview ung SAVED POST PAGE - in progress
Route::get('saved', [SavedController::class, 'index'])->name('saved.index');

// eto para maview ung specific post (AKA ung READ MORE PAGE) - in progress
Route::get('recipe-post/{recipe_post_name}/{id}', [PostController::class, 'show'])->name('recipe-post.view');

// eto para sa VIEW PROFILE PAGE - in progress
Route::get('profile/{id}', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');

Route::post('profile/change-profile', [ProfileController::class, 'profile'])->middleware('auth')->name('profile.change-image');



// LOGIN REGISTER CONTROLLERS

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');

Route::post('login/submit',  [LoginController::class, 'submit'])->name('userlogin.submit');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');

Route::post('register/submit', [RegisterController::class, 'store'])->name('register.store');

Route::get('auth/{service}', [GithubController::class, 'redirectToGithub'])->name('service.register');

Route::get('auth/{service}/callback', [GithubController::class, 'handleGithubCallback'])->name('service.login');

// USER CONTROLLERS

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


// PROFILE CONTROLLERS

Route::get('/edit-data/{id}', [ProfileController::class, 'edit_post'])->middleware('auth');

// INDEX // LANDING PAGE CONTROLLERS

Route::get('/', [NavigationController::class, 'index'])->name('index');

// POST CONTROLLERS

Route::get('/home', [PostController::class, 'index'])->name('post.index');

//this shows the UI
Route::get("/create-post", [PostController::class, 'create'])->middleware('auth')->name('create.post');

//CREATE STATUS
Route::get("/create-status", [StatusController::class, 'create'])->middleware('auth')->name('create.status');
// STORE STATUS
Route::post("/store-status", [StatusController::class, 'store'])->middleware('auth')->name('store.status');


//this stores the post
Route::post('/store_post', [PostController::class, 'store'])->name('post.store');

Route::post('/edit_post', [PostController::class, 'update'])->name('post.edit');


Route::get('/post_vote/{post_id}/{up_or_down_vote}', [PostController::class, 'vote'])->middleware('auth')->name('post.vote');


Route::post('/comment', [PostController::class, 'comment'])->name('post.comment');

Route::get('/comment-onload/{id}', [PostController::class, 'comment_onload'])->name('post.comment-onload');

Route::get('/save/{id}', [PostController::class, 'save_post'])->name('save.post');


/// ->uncomment this. commented only for prod
Route::get("/signup", [App\Http\Livewire\Pages\AuthPage\Signup::class, '__index']);


// Route::get("/", Login::class);
Route::get("/", [MainPage::class, '__invoke'])->name('index');

Route::get("/waisfood-engine", [App\Http\Livewire\Pages\RecipeGeneratorPages\GeneratorOnePage\GeneratorOne::class, '__invoke'])->name('generator');

Route::get("/recipeGeneratorTwo",  [App\Http\Livewire\Pages\RecipeGeneratorPages\GeneratorOnePage\GeneratorTwo::class, '__invoke']);
// Route::get("/savedItems", SavedItems::class);

Route::get("/saved-items", [App\Http\Livewire\Pages\SavedItemsPage\SavedItems::class, '__invoke'])->middleware('auth')->name('saved.items');

Route::get("/recipeFeed", [App\Http\Livewire\Pages\RecipeFeedPage\RecipeFeed::class, '__invoke']);


Route::get("/view-profile", [App\Http\Livewire\Pages\ReadMorePage\ReadMore::class, '__invoke'])->name('view.profile');

Route::get("/newsFeed", [App\Http\Livewire\Pages\NewsFeedPage\NewsFeed::class, '__invoke']);

// ADMIN
Route::group(['prefix' => 'admin'], function() {
	// Registration
	Route::get('/register', [AdminLoginRegisterController::class, 'registration'])->name('admin.registration');
    // Login
	Route::get('/login', [AdminLoginRegisterController::class, 'login'])->name('admin.login');

	Route::post('/register/submit', [AdminLoginRegisterController::class, 'register_store'])->name('register.submit');

	Route::post('/login/submit', [AdminLoginRegisterController::class, 'submit'])->name('login.submit');

    Route::middleware(['admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // User Management
        Route::get('/user-management', [AdminUserManagementController::class, 'index'])->name('admin.user-management');

        // Post & Recipe Proposal
        Route::get('/recipe-approval', [RecipeApprovalController::class, 'index'])->name('admin.recipe-appoval');
        Route::get('/recipe-approval/confirm', [RecipeApprovalController::class, 'confirm_done'])->name('admin.confirm_done');
        Route::get('/recipe-approval/confirm/{id}', [RecipeApprovalController::class, 'approved'])->name('admin.confirmed_id');

        // Content Management
        Route::get('/content-management', [AdminContentManagementController::class, 'index'])->name('admin.content-management');
    });

});
