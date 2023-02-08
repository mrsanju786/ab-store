<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginRegisterController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\DashboardController;

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

Route::group(['prefix' => 'admin'], function()
{   
    
        Route::get('/', function () {
            return redirect()->route('login');
        });

        Route::get('/test', [DashboardController::class, 'test'])->name('test');
        
        /**
         * Register Routes
         */
        Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
        Route::post('/save-register', [LoginRegisterController::class, 'saveRegister'])->name('save-register');

        /**
         * Login Routes
         */
        Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
        Route::post('/create-login', [LoginRegisterController::class, 'createLogin'])->name('create-login');


    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

        Route::view('/dashboard', 'admin-view/dashboard')->name('dashboard');

        Route::get('/role', [RoleController::class, 'role'])->name('role');
        Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
        Route::post('/create-role', [RoleController::class, 'createRole'])->name('create-role');
        Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
        Route::post('/update-role/{id}', [RoleController::class, 'updateRole'])->name('update-role');


        /**
         * User Routes
         */
        // Route::group(['prefix' => 'users'], function() {
        //     Route::get('/', 'UsersController@index')->name('users.index');
        //     Route::get('/create', 'UsersController@create')->name('users.create');
        //     Route::post('/create', 'UsersController@store')->name('users.store');
        //     Route::get('/{user}/show', 'UsersController@show')->name('users.show');
        //     Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
        //     Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
        //     Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        // });
        
    });
});
