<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\APIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [LoginController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function(){

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/company-list', [APIController::class, 'companyList']);
    Route::get('/branch-list', [APIController::class, 'branchList']);
    Route::get('/counter-list', [APIController::class, 'counterList']);
    Route::get('/dish-list', [APIController::class, 'dishList']);
    Route::get('/menu-list', [APIController::class, 'menuList']);
    Route::get('/category-list', [APIController::class, 'categoryList']);
    Route::get('/location-list', [APIController::class, 'LocationList']);
    Route::get('/area-list', [APIController::class, 'AreaList']);
    Route::get('/location-discount', [APIController::class, 'LocationDiscountList']);
});
