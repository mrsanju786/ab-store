<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CounterController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\DishController;
use App\Http\Controllers\user\MenuController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\OrderController;

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
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'Home'])->name('home');
Route::get('/counter', [CounterController::class, 'all_counter'])->name('all_counter');

Route::get('/menu/{id}', [MenuController::class, 'all_menu'])->name('all_menu');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category');

Route::get('/category-dish/{id}', [DishController::class, 'categoryDish'])->name('category-dish');
Route::get('/dish/{id}', [DishController::class, 'dish'])->name('dish');

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/place-order', [OrderController::class, 'placeOrder'])->name('place-order');


