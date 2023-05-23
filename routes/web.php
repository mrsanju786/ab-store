<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\CartController;
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

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'createLogin']);

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerUser']);

Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
Route::post('/profile-update/{id}', [LoginController::class, 'updateProfile'])->name('profile-update');
Route::post('/changed-password/{id}', [LoginController::class, 'updatePassword'])->name('changed-password');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        

//all page route
Route::get('/shop-category/{id}', [HomeController::class, 'category'])->name('shop-category');
Route::get('/products', [HomeController::class, 'Products'])->name('products');
Route::get('/product-detail/{id}', [HomeController::class, 'ProductDetails'])->name('product-detail');
//subscribed email route
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::post('store-review/{id}', [HomeController::class, 'addReview']);

//contact us route
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
Route::post('/contact', [HomeController::class, 'addContactUs'])->name('addContactUs');

//add to cart
Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart',[CartController::class, 'view'])->name('cart');
Route::get('/wishlist',[HomeController::class, 'myWishlist']);
Route::post('/update-wishlist', [HomeController::class, 'addFavouriteProduct'])->name('addFavouriteProduct');

Route::post('/check-product-size',[HomeController::class, 'checkProductSize'])->name('check-product-size');
Route::post('/check-product-color',[HomeController::class, 'checkProductColor'])->name('check-product-color');
Route::get('/product-color/{id}/{color}',[HomeController::class, 'ProductColor'])->name('product-color');
