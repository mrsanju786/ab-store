<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\APIController;
use App\Http\Controllers\api\POSController;
use App\Http\Controllers\api\MobileAppController;

//admin route controller
use App\Http\Controllers\api\AdminApi\RoleController;
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

    
    Route::get('/counter-wise-dish', [POSController::class, 'counterWiseDish']);
    Route::get('/pos/company-list', [POSController::class, 'companyList']);

    
    //mobile app routes
    Route::get('get-counter-list', [MobileAppController::class, 'getCounterList']);
    Route::get('get-menu-list', [MobileAppController::class, 'getMenuList']);
    Route::get('get-category-list', [MobileAppController::class, 'getCategoryList']);
    Route::get('get-dish-list', [MobileAppController::class, 'getDishList']);
    
   
});
    //pos route
    Route::post('/add-to-cart', [POSController::class, 'addToCart']);
    Route::get('/cart-list', [POSController::class, 'cartList']);
    Route::post('/save-order', [POSController::class, 'saveOrder']);
    Route::post('/save-order-details', [POSController::class, 'svaeOrderDetails']);
    Route::post('/multiple-order-save', [POSController::class, 'bulkOrderSave']);

    //order route
    Route::get('/order-list', [POSController::class, 'orderList']);
    Route::get('/order-details', [POSController::class, 'orderDetailsList']);
    

    //mobile application route
    Route::post('mobile/save-order', [MobileAppController::class, 'saveOrder']);
    Route::post('mobile/save-order-details', [MobileAppController::class, 'svaeOrderDetails']);
    Route::post('mobile/multiple-order-save', [MobileAppController::class, 'bulkOrderSave']);
    Route::get('mobile/order-list', [MobileAppController::class, 'orderList']);
    Route::get('mobile/order-details', [MobileAppController::class, 'orderDetailsList']);


    //admin side apis route
    Route::group(['prefix'=>'admin','middleware' => ['auth:api']], function(){
        Route::get('/role', [RoleController::class, 'role']);
        Route::get('/permissions', [RoleController::class, 'PermissionList']);
        Route::post('/store', [RoleController::class, 'store']);
        Route::post('/update/{id}', [RoleController::class, 'update']);
    });     