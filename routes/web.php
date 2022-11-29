<?php

 

use App\Http\livewire\Pages\AuthPage\Signup;
use App\Http\livewire\Pages\AuthPage\Login;
use App\Http\livewire\Pages\MainPage\MainPage;
use App\Http\livewire\Pages\RecipeGeneratorPages\GeneratorOnePage\GeneratorOne;
use App\Http\livewire\Pages\RecipeGeneratorPages\GeneratorTwoPage\GeneratorTwo;
use App\Http\livewire\Pages\SavedItemsPage\SavedItems;
use App\Http\livewire\Pages\RecipeFeedPage\RecipeFeed;
 
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

Route::get("/signup", Signup::class);
Route::get("/", Login::class);
Route::get("/mainPage", MainPage::class);
Route::get("/recipeGeneratorOne", GeneratorOne::class);
Route::get("/recipeGeneratorTwo", GeneratorTwo::class);
Route::get("/savedItems", SavedItems::class);
Route::get("/recipeFeed", RecipeFeed::class);
 


