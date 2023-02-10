<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginRegisterController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\FoodlicenseController;


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


        // Route::group(['middleware' => ['auth', 'permission']], function() {
        Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

        Route::get('/role', [RoleController::class, 'role'])->name('role');
        Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
        Route::post('/create-role', [RoleController::class, 'createRole'])->name('create-role');
        Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
        Route::post('/update-role/{id}', [RoleController::class, 'updateRole'])->name('update-role');

        Route::get('/user', [UserController::class, 'user'])->name('user');
        Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
        Route::post('/create-user', [UserController::class, 'createUser'])->name('create-user');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');

        Route::get('/add-branch', [BranchController::class, 'addBranch'])->name('add-branch');

        /**
         * Company Routes
         */
        Route::get('/company-list', [CompanyController::class, 'index'])->name('company_list');
        Route::get('/add-company', [CompanyController::class, 'addCompany'])->name('add-company');
        Route::post('/create-company', [CompanyController::class, 'createCompany'])->name('create-company');
        Route::get('/edit-company/{id}', [CompanyController::class, 'editCompany'])->name('edit-company');
        Route::post('/update-company', [CompanyController::class, 'updateCompany'])->name('update-company');
        Route::get('/company-status/{id}/{status}', [CompanyController::class, 'companyStatus'])->name('company-status');

        /**
         * Foodlicense Routes
         */
        Route::get('/foodlicense-list', [FoodlicenseController::class, 'index'])->name('foodlicense_list');
        Route::get('/add-foodlicense', [FoodlicenseController::class, 'addFoodlicense'])->name('add-foodlicense');
        Route::post('/create-foodlicense', [FoodlicenseController::class, 'createFoodlicense'])->name('create-foodlicense');
        Route::get('/edit-foodlicense/{id}', [FoodlicenseController::class, 'editFoodlicense'])->name('edit-foodlicense');
        Route::post('/update-foodlicense', [FoodlicenseController::class, 'updateFoodlicense'])->name('update-foodlicense');


        /**
         * Branch Routes
         */
        Route::get('/branch-list', [BranchController::class, 'index'])->name('branch_list');
        Route::get('/add-branch', [BranchController::class, 'addBranch'])->name('add-branch');
        Route::post('/create-branch', [BranchController::class, 'createBranch'])->name('create-branch');
        Route::get('/edit-branch/{id}', [BranchController::class, 'editBranch'])->name('edit-branch');
        Route::post('/update-branch', [BranchController::class, 'updateBranch'])->name('update-branch');
        Route::get('/branch-status/{id}/{status}', [BranchController::class, 'branchStatus'])->name('branch-status');

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
