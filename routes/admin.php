<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\ProductOptionController;
use App\Http\Controllers\admin\ProductColorController;
use App\Http\Controllers\admin\ProductColorVariantController;
use App\Http\Controllers\admin\ProductSizeVariantController;
use App\Http\Controllers\admin\OrderController;
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
            Route::get('product/active/{id}', [ProductController::class, 'active'])->name('product/active');
            Route::get('product/inactive/{id}', [ProductController::class, 'inActive'])->name('product/inActive');
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
            Route::get('category/active/{id}', [CategoryController::class, 'active'])->name('category/active');
            Route::get('category/inactive/{id}', [CategoryController::class, 'inActive'])->name('category/inActive');

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
            Route::get('banner/active/{id}', [BannerController::class, 'active'])->name('banner/active');
            Route::get('banner/inactive/{id}', [BannerController::class, 'inActive'])->name('banner/inActive');

             /**
             * product option  Routes
             */
            Route::get('option/index', [ProductOptionController::class, 'index'])->name('option/index');
            Route::get('option/create', [ProductOptionController::class, 'create'])->name('option/create');
            Route::post('option/store', [ProductOptionController::class, 'store'])->name('option/store');
            Route::get('option/edit/{id}', [ProductOptionController::class, 'edit'])->name('option/edit');
            Route::post('option/update/{id}', [ProductOptionController::class, 'update'])->name('option/update');
            Route::get('option/delete/{id}', [ProductOptionController::class, 'delete'])->name('option/delete');
            Route::get('option/view/{id}', [ProductOptionController::class, 'view'])->name('option/view');
            Route::get('option/active/{id}', [ProductOptionController::class, 'active'])->name('option/active');
            Route::get('option/inactive/{id}', [ProductOptionController::class, 'inActive'])->name('option/inActive');
             
            /**
             * product color  Routes
             */
            Route::get('color/index', [ProductColorController::class, 'index'])->name('color/index');
            Route::get('color/create', [ProductColorController::class, 'create'])->name('color/create');
            Route::post('color/store', [ProductColorController::class, 'store'])->name('color/store');
            Route::get('color/edit/{id}', [ProductColorController::class, 'edit'])->name('color/edit');
            Route::post('color/update/{id}', [ProductColorController::class, 'update'])->name('color/update');
            Route::get('color/delete/{id}', [ProductColorController::class, 'delete'])->name('color/delete');
            Route::get('color/view/{id}', [ProductColorController::class, 'view'])->name('color/view');
            Route::get('color/active/{id}', [ProductColorController::class, 'active'])->name('color/active');
            Route::get('color/inactive/{id}', [ProductColorController::class, 'inActive'])->name('color/inActive');
             /**
             * product color variant  Routes
             */
            Route::get('variantcolor/index', [ProductColorVariantController::class, 'index'])->name('variantcolor/index');
            Route::get('variantcolor/create', [ProductColorVariantController::class, 'create'])->name('variantcolor/create');
            Route::post('variantcolor/store', [ProductColorVariantController::class, 'store'])->name('variantcolor/store');
            Route::get('variantcolor/edit/{id}', [ProductColorVariantController::class, 'edit'])->name('variantcolor/edit');
            Route::post('variantcolor/update/{id}', [ProductColorVariantController::class, 'update'])->name('variantcolor/update');
            Route::get('variantcolor/delete/{id}', [ProductColorVariantController::class, 'delete'])->name('variantcolor/delete');
            Route::get('variantcolor/view/{id}', [ProductColorVariantController::class, 'view'])->name('variantcolor/view');
            Route::get('variantcolor/active/{id}', [ProductColorVariantController::class, 'active'])->name('variantcolor/active');
            Route::get('variantcolor/inactive/{id}', [ProductColorVariantController::class, 'inActive'])->name('variantcolor/inActive');
             /**
             * product size variant  Routes
             */
            Route::get('variantsize/index', [ProductSizeVariantController::class, 'index'])->name('variantsize/index');
            Route::get('variantsize/create', [ProductSizeVariantController::class, 'create'])->name('variantsize/create');
            Route::post('variantsize/store', [ProductSizeVariantController::class, 'store'])->name('variantsize/store');
            Route::get('variantsize/edit/{id}', [ProductSizeVariantController::class, 'edit'])->name('variantsize/edit');
            Route::post('variantsize/update/{id}', [ProductSizeVariantController::class, 'update'])->name('variantsize/update');
            Route::get('variantsize/delete/{id}', [ProductSizeVariantController::class, 'delete'])->name('variantsize/delete');
            Route::get('variantsize/view/{id}', [ProductSizeVariantController::class, 'view'])->name('variantsize/view');
            Route::get('variantsize/active/{id}', [ProductSizeVariantController::class, 'active'])->name('variantsize/active');
            Route::get('variantsize/inactive/{id}', [ProductSizeVariantController::class, 'inActive'])->name('variantsize/inActive');
            /**
            * admin contact Routes
            */
           Route::get('contact/index', [AdminController::class, 'conatctList'])->name('contact/index');
           Route::get('contact/view/{id}', [AdminController::class, 'conatctView'])->name('contact/view');
           Route::get('contact/active/{id}', [AdminController::class, 'conatctActive'])->name('contact/active');
           Route::get('contact/inactive/{id}', [AdminController::class, 'conatctInActive'])->name('contact/inActive');

           /**
            * admin subscribed Routes
            */
            Route::get('subscribe/index', [AdminController::class, 'subscribeList'])->name('subscribe/index');
            Route::get('subscribe/view/{id}', [AdminController::class, 'subscribeView'])->name('subscribe/view');
            Route::get('subscribe/active/{id}', [AdminController::class, 'subscribeActive'])->name('subscribe/active');
            Route::get('subscribe/inactive/{id}', [AdminController::class, 'subscribeInActive'])->name('subscribe/inActive');
           
             /**
            * admin order Routes
            */
           Route::get('order/index', [OrderController::class, 'index'])->name('index');
           
    });

