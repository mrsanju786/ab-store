<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
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
Route::get('/shop-category', [HomeController::class, 'Category'])->name('shop-category');


