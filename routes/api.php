<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function(){

    Route::post('/logout', [AuthController::class, 'logout']);
    
    //product route
    Route::get('/category-list', [APIController::class, 'categoryList']);
    Route::get('/product-list', [APIController::class, 'productList']);
    Route::get('/product-detail', [APIController::class, 'productDetails']);
    Route::get('/search-product', [APIController::class, 'searchProduct']);
});
   