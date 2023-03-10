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
use App\Http\Controllers\api\AdminApi\MenuController;
use App\Http\Controllers\api\AdminApi\CategoryController;
use App\Http\Controllers\api\AdminApi\DishController;
use App\Http\Controllers\api\AdminApi\AddonController;
use App\Http\Controllers\api\AdminApi\ExtraController;
use App\Http\Controllers\api\AdminApi\FoodlicenseController;
use App\Http\Controllers\api\AdminApi\RegionController;
use App\Http\Controllers\api\AdminApi\LicenseController;
use App\Http\Controllers\api\AdminApi\CurrencyController;
use App\Http\Controllers\api\AdminApi\TimezoneController;
use App\Http\Controllers\api\AdminApi\CountryController;
use App\Http\Controllers\api\AdminApi\StateController;
use App\Http\Controllers\api\AdminApi\CityController;
use App\Http\Controllers\api\AdminApi\TaxController;
use App\Http\Controllers\api\AdminApi\CountryTaxController;
use App\Http\Controllers\api\AdminApi\DishVariantController;
use App\Http\Controllers\api\AdminApi\OptionController;
use App\Http\Controllers\api\AdminApi\DiscountController;
use App\Http\Controllers\api\AdminApi\UserController;

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
    Route::get('mobile/counter-wise-dish', [MobileAppController::class, 'counterWiseDish']);
    
   
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
    
    //opening Closing Blance route
    Route::get('/opening-closing-balance', [POSController::class, 'openingClosingBlance']);
    
    //mobile application route
    Route::post('mobile/save-order', [MobileAppController::class, 'saveOrder']);
    Route::post('mobile/save-order-details', [MobileAppController::class, 'svaeOrderDetails']);
    Route::post('mobile/multiple-order-save', [MobileAppController::class, 'bulkOrderSave']);
    Route::get('mobile/order-list', [MobileAppController::class, 'orderList']);
    Route::get('mobile/order-details', [MobileAppController::class, 'orderDetailsList']);
    Route::get('mobile/counter-wise-dish', [MobileAppController::class, 'counterWiseDish']);


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

        /**
         * Dish Routes
         */
        Route::get('/menu-list', [MenuController::class, 'index']);
        Route::post('/create-menu', [MenuController::class, 'createMenu']);
        Route::post('/update-menu', [MenuController::class, 'updateMenu']);
        Route::post('/menu-status', [MenuController::class, 'menuStatus']);
        Route::get('/get-menu/{id}', [MenuController::class, 'getMenu']);

        /**
         * category Routes
         */
        Route::get('/category-list', [CategoryController::class, 'index']);
        Route::post('/create-category', [CategoryController::class, 'createCategory']);
        Route::post('/update-category', [CategoryController::class, 'updateCategory']);
        Route::get('/get-category/{id}', [CategoryController::class, 'getCategory']);

         /**
         * Dish Routes
         */
        Route::get('/dish-list', [DishController::class, 'index']);
        Route::post('/create-dish', [DishController::class, 'createDish']);
        Route::post('/update-dish', [DishController::class, 'updateDish']);
        Route::post('/dish-status', [DishController::class, 'dishStatus']);

        Route::get('/get-branch-tax/{id}', [DishController::class, 'getBranchTax']);
        Route::get('/export-dish', [DishController::class, 'exportDish']);
        Route::post('/import-dish', [DishController::class, 'importDish']);
        Route::post('/update-dish-excel', [DishController::class, 'updateDishexcel']);

        /**
         * addon Routes
         */
        Route::get('/addon-list', [AddonController::class, 'index']);
        Route::get('/add-addon/{id}', [AddonController::class, 'addAddon']);
        Route::post('/create-addon', [AddonController::class, 'createAddon']);
        Route::get('/edit-addon/{id?}', [AddonController::class, 'editAddon']);
        Route::post('/update-addon', [AddonController::class, 'updateAddon']);
        Route::get('/addon-status', [AddonController::class, 'AddonStatus']);

        /**
         * extras Routes
         */
        Route::get('/extra-list', [ExtraController::class, 'index']);
        Route::get('/add-extra/{id}', [ExtraController::class, 'addExtra']);
        Route::post('/create-extra', [ExtraController::class, 'createExtra']);
        Route::get('/edit-extra/{id?}', [ExtraController::class, 'editExtra']);
        Route::post('/update-extra', [ExtraController::class, 'updateExtra']);
        Route::get('/extra-status', [ExtraController::class, 'extraStatus']);

         /**
         * Option Variant Routes
         */
        Route::get('/option-list', [OptionController::class, 'index']);
        Route::get('/add-option/{id}', [OptionController::class, 'addOption']);
        Route::post('/create-option', [OptionController::class, 'createOption']);
        Route::get('/edit-option/{id?}', [OptionController::class, 'editOption']);
        Route::post('/update-option', [OptionController::class, 'updateOption']);
        Route::get('/option-status', [OptionController::class, 'optionStatus']);

          /**
         * Dish Variant Routes
         */
        Route::get('/dishvariant-list', [DishVariantController::class, 'index']);
        Route::get('/add-dishvariant/{id}', [DishVariantController::class, 'addDishVariant']);
        Route::post('/create-dishvariant', [DishVariantController::class, 'createDishVariant']);
        Route::get('/edit-dishvariant/{id?}', [DishVariantController::class, 'editDishVariant']);
        Route::post('/update-dishvariant', [DishVariantController::class, 'updateDishVariant']);
        Route::get('/dishvariant-status', [DishVariantController::class, 'dishvariantStatus']);

        /**
         * Tax Routes
         */
        Route::get('/tax-list', [TaxController::class, 'index']);
        Route::get('/add-tax', [TaxController::class, 'addTax']);
        Route::post('/create-tax', [TaxController::class, 'createTax']);
        Route::get('/edit-tax/{id}', [TaxController::class, 'editTax']);
        Route::post('/update-tax', [TaxController::class, 'updateTax']);

        /**
             * License Routes
             */
            Route::get('/license-list', [LicenseController::class, 'index']);
            Route::get('/add-license', [LicenseController::class, 'addLicense']);
            Route::post('/create-license', [LicenseController::class, 'createLicense']);
            Route::get('/edit-license/{id}', [LicenseController::class, 'editLicense']);
            Route::post('/update-license', [LicenseController::class, 'updateLicense']);

            /**
             * Currency Routes
             */
            Route::get('/currency-list', [CurrencyController::class, 'index'])->name('currency-list');
            Route::get('/add-currency', [CurrencyController::class, 'addCurrency'])->name('add-currency');
            Route::post('/create-currency', [CurrencyController::class, 'createCurrency'])->name('create-currency');
            Route::get('/edit-currency/{id}', [CurrencyController::class, 'editCurrency'])->name('edit-currency');
            Route::post('/update-currency', [CurrencyController::class, 'updateCurrency'])->name('update-currency');

            /**
             * Timezone Routes
             */
            Route::get('/timezone-list', [TimezoneController::class, 'index'])->name('timezone-list');
            Route::get('/add-timezone', [TimezoneController::class, 'addTimezone'])->name('add-timezone');
            Route::post('/create-timezone', [TimezoneController::class, 'createTimezone'])->name('create-timezone');
            Route::get('/edit-timezone/{id}', [TimezoneController::class, 'editTimezone'])->name('edit-timezone');
            Route::post('/update-timezone', [TimezoneController::class, 'updateTimezone'])->name('update-timezone');


            /**
             * Foodlicense Routes
             */
            Route::get('/foodlicense-list', [FoodlicenseController::class, 'index'])->name('foodlicense-list');
            Route::get('/add-foodlicense', [FoodlicenseController::class, 'addFoodlicense'])->name('add-foodlicense');
            Route::post('/create-foodlicense', [FoodlicenseController::class, 'createFoodlicense'])->name('create-foodlicense');
            Route::get('/edit-foodlicense/{id}', [FoodlicenseController::class, 'editFoodlicense'])->name('edit-foodlicense');
            Route::post('/update-foodlicense', [FoodlicenseController::class, 'updateFoodlicense'])->name('update-foodlicense');


            /**
             * Region Routes
             */
            Route::get('/region-list', [RegionController::class, 'index'])->name('region-list');
            Route::get('/add-region', [RegionController::class, 'addRegion'])->name('add-region');
            Route::post('/create-region', [RegionController::class, 'createRegion'])->name('create-region');
            Route::get('/edit-region/{id}', [RegionController::class, 'editRegion'])->name('edit-region');
            Route::post('/update-region', [RegionController::class, 'updateRegion'])->name('update-region');
            Route::get('/region-status', [RegionController::class, 'regionStatus'])->name('region-status');


            /**
             * Country Routes
             */
            Route::get('/country-list', [CountryController::class, 'index'])->name('country-list');
            Route::get('/add-country', [CountryController::class, 'addCountry'])->name('add-country');
            Route::post('/create-country', [CountryController::class, 'createCountry'])->name('create-country');
            Route::get('/edit-country/{id}', [CountryController::class, 'editCountry'])->name('edit-country');
            Route::post('/update-country', [CountryController::class, 'updateCountry'])->name('update-country');

            /**
             * State Routes
             */
            Route::get('/state-list', [StateController::class, 'index'])->name('state-list');
            Route::get('/add-state', [StateController::class, 'addState'])->name('add-state');
            Route::post('/create-state', [StateController::class, 'createState'])->name('create-state');
            Route::get('/edit-state/{id}', [StateController::class, 'editState'])->name('edit-state');
            Route::post('/update-state', [StateController::class, 'updateState'])->name('update-state');
            Route::get('/get-state/{id}', [StateController::class, 'getState'])->name('get-state');

            /**
             * City Routes
             */
            Route::get('/city-list', [CityController::class, 'index'])->name('city-list');
            Route::get('/add-city', [CityController::class, 'addCity'])->name('add-city');
            Route::post('/create-city', [CityController::class, 'createCity'])->name('create-city');
            Route::get('/edit-city/{id}', [CityController::class, 'editCity'])->name('edit-city');
            Route::post('/update-city', [CityController::class, 'updateCity'])->name('update-city');
            Route::get('/get-city/{id}', [CityController::class, 'getCity'])->name('get-city');

            /**
             * Countrytax Routes
             */
            Route::get('/countrytax-list', [CountrytaxController::class, 'index'])->name('countrytax-list');
            Route::get('/add-countrytax', [CountrytaxController::class, 'addCountrytax'])->name('add-countrytax');
            Route::post('/create-countrytax', [CountrytaxController::class, 'createCountrytax'])->name('create-countrytax');
            Route::get('/edit-countrytax/{id}', [CountrytaxController::class, 'editCountrytax'])->name('edit-countrytax');
            Route::post('/update-countrytax', [CountrytaxController::class, 'updateCountrytax'])->name('update-countrytax');
            Route::get('/countrytax-status', [CountrytaxController::class, 'countrytaxStatus'])->name('countrytax-status');

            Route::get('/get-company-city/{id}', [CityController::class, 'getCompanyCity'])->name('get-company-city');

            Route::get('/get-country-tax/{id}', [CountrytaxController::class, 'getCountryTax'])->name('getCountryTax');

            /**
             * Discount Routes
             */
            Route::get('/discount-list', [DiscountController::class, 'index'])->name('discount-list');
            Route::get('/add-discount', [DiscountController::class, 'addDiscount'])->name('add-discount');
            Route::post('/create-discount', [DiscountController::class, 'createDiscount'])->name('create-discount');
            Route::get('/edit-discount/{id}', [DiscountController::class, 'editDiscount'])->name('edit-discount');
            Route::post('/update-discount', [DiscountController::class, 'updateDiscount'])->name('update-discount');
            Route::get('/discount-status', [DiscountController::class, 'discountStatus'])->name('discount-status');

            /**
             * Users Routes
             */
            Route::get('/user-list', [UserController::class, 'index'])->name('user-list');
            Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
            Route::post('/create-user', [UserController::class, 'createUser'])->name('create-user');
            Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
            Route::post('/update-user', [UserController::class, 'updateUser'])->name('update-user');

    });     