<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CounterController;
use App\Http\Controllers\user\MenuController;

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
Route::get('/category/{id}', [MenuController::class, 'all_category'])->name('all_category');
