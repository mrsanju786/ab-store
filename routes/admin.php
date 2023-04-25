<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\StaffController;
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
            return redirect()->route('login');
        });

        /**
         * Login Routes
         */
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/create-login', [AdminController::class, 'createLogin'])->name('create-login');

        Route::group(['middleware' => ['auth']], function() {
            /**
             * Logout Routes
             */
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
            /**
             * update profile Routes
             */
            Route::get('/edit-profile/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/update-profile/{id}', [AdminController::class, 'update'])->name('update');
             /**
             * change password Routes
             */
            Route::get('/change-password/{id}', [AdminController::class, 'changePassword'])->name('chnage-password');
            Route::post('/update-password/{id}', [AdminController::class, 'updatePassword'])->name('update-password');

            Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

            /**
             * User Routes
             */
            Route::get('user/index', [UsersController::class, 'index'])->name('user/index');
            /**
             * admin users Routes
             */
            Route::get('index', [UsersController::class, 'index'])->name('index');
            Route::get('create', [UsersController::class, 'create'])->name('create');
            Route::post('store', [UsersController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UsersController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [UsersController::class, 'update'])->name('update');
            Route::get('delete/{id}', [UsersController::class, 'delete'])->name('delete');
            Route::get('view/{id}', [UsersController::class, 'view'])->name('view');
            /**
             * admin staff Routes
             */
            Route::get('staff/index', [StaffController::class, 'index'])->name('staff/index');
            Route::get('staff/create', [StaffController::class, 'create'])->name('staff/create');
            Route::post('staff/store', [StaffController::class, 'store'])->name('staff/store');
            Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff/edit');
            Route::post('staff/update/{id}', [StaffController::class, 'update'])->name('staff/update');
            Route::get('staff/delete/{id}', [StaffController::class, 'delete'])->name('staff/delete');
            Route::get('staff/view/{id}', [StaffController::class, 'view'])->name('staff/view');
            /**
             * Product Routes
             */
            Route::get('product/index', [ProductController::class, 'index'])->name('product/index');
            Route::get('product/create', [ProductController::class, 'create'])->name('product/create');
            Route::post('product/store', [ProductController::class, 'store'])->name('product/store');
            Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product/edit');
            Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product/update');
            Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product/delete');
            Route::get('product/view/{id}', [ProductController::class, 'view'])->name('product/view');
            /**
             * Category Routes
             */
            Route::get('category/index', [CategoryController::class, 'index'])->name('category/index');
            Route::get('category/create', [CategoryController::class, 'create'])->name('category/create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('category/store');
            Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category/edit');
            Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category/update');
            Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category/delete');
            Route::get('category/view/{id}', [CategoryController::class, 'view'])->name('category/view');

            /**
             * Banner Routes
             */
            Route::get('banner/index', [BannerController::class, 'index'])->name('banner/index');
            Route::get('banner/create', [BannerController::class, 'create'])->name('banner/create');
            Route::post('banner/store', [BannerController::class, 'store'])->name('banner/store');
            Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('banner/edit');
            Route::post('banner/update/{id}', [BannerController::class, 'update'])->name('banner/update');
            Route::get('banner/delete/{id}', [BannerController::class, 'delete'])->name('banner/delete');
            Route::get('banner/view/{id}', [BannerController::class, 'view'])->name('banner/view');
    });

