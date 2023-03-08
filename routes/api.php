<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\APIController;
use App\Http\Controllers\api\POSController;
use App\Http\Controllers\api\MobileAppController;

//admin route controller
use App\Http\Controllers\api\AdminApi\RoleController;
use App\Http\Controllers\api\AdminApi\DashboardController;
use App\Http\Controllers\api\AdminApi\CompanyController;
use App\Http\Controllers\api\AdminApi\BranchController;
use App\Http\Controllers\api\AdminApi\LocationController;
use App\Http\Controllers\api\AdminApi\AreaController;
use App\Http\Controllers\api\AdminApi\CounterController;
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
         /**
         * dashboard Routes
         */
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        /**
         * role Routes
         */
        Route::get('/role', [RoleController::class, 'role']);
        Route::get('/permissions', [RoleController::class, 'PermissionList']);
        Route::post('/store', [RoleController::class, 'store']);
        Route::post('/update', [RoleController::class, 'update']);

        /**
         * Company Routes
         */
        Route::get('/company-list', [CompanyController::class, 'index']);
        Route::get('/license-list', [CompanyController::class, 'licenseList']);
        Route::post('/create-company', [CompanyController::class, 'createCompany']);
        Route::post('/update-company', [CompanyController::class, 'updateCompany']);
        Route::post('/company-status', [CompanyController::class, 'companyStatus']);
            
        /**
         * Branch Routes
         */
        Route::get('/branch-list', [BranchController::class, 'index']);
        Route::get('/region-list', [BranchController::class, 'regionList']);
        Route::post('/create-branch', [BranchController::class, 'createBranch']);
        Route::get('/edit-branch/{id}', [BranchController::class, 'editBranch']);
        Route::post('/update-branch', [BranchController::class, 'updateBranch']);
        Route::post('/branch-status', [BranchController::class, 'branchStatus']);

        Route::get('/get-branch/{id}', [BranchController::class, 'getBranch']);

        /**
         * Location Routes
         */
        Route::get('/location-list', [LocationController::class, 'index']);
        Route::post('/create-location', [LocationController::class, 'createLocation']);
        Route::post('/update-location', [LocationController::class, 'updateLocation']);
        Route::post('/location-status', [LocationController::class, 'locationStatus']);
        /**
         * Area Routes
         */
        Route::get('/area-list', [AreaController::class, 'index']);
        Route::post('/create-area', [AreaController::class, 'createArea']);
        Route::post('/update-area', [AreaController::class, 'updateArea']);
        Route::post('/area-status', [AreaController::class, 'areaStatus']);

        /**
         * counter Routes
         */
        Route::get('/counter-list', [CounterController::class, 'index']);
        Route::post('/create-counter', [CounterController::class, 'createCounter']);
        Route::post('/update-counter', [CounterController::class, 'updateCounter']);
        Route::get('/counter-status/{id}/{status}', [CounterController::class, 'areaStatus']);
        Route::get('/get-counter-by-branch/{id}', [CounterController::class, 'getCounterByBranch']);
    });     