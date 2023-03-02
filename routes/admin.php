<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginRegisterController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\FoodlicenseController;
use App\Http\Controllers\admin\RegionController;
use App\Http\Controllers\admin\LicenseController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\admin\TimezoneController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\LocationDiscountController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\admin\LocationTaxController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\CounterController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DishController;
use App\Http\Controllers\admin\CountryTaxController;
use App\Http\Controllers\admin\DishVariantController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ExtraController;
use App\Http\Controllers\admin\AddOnController;


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

// Route::group(['prefix' => 'admin'], function()
// {   
    
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

        Route::get('/user-list', [UserController::class, 'index'])->name('user-list');
        Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
        Route::post('/create-user', [UserController::class, 'createUser'])->name('create-user');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::post('/update-user', [UserController::class, 'updateUser'])->name('update-user');
        
        Route::group(['prefix' => 'master'], function()
        {
            /**
             * License Routes
             */
            Route::get('/license-list', [LicenseController::class, 'index'])->name('license-list');
            Route::get('/add-license', [LicenseController::class, 'addLicense'])->name('add-license');
            Route::post('/create-license', [LicenseController::class, 'createLicense'])->name('create-license');
            Route::get('/edit-license/{id}', [LicenseController::class, 'editLicense'])->name('edit-license');
            Route::post('/update-license', [LicenseController::class, 'updateLicense'])->name('update-license');

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
            Route::get('/foodlicense-list', [FoodlicenseController::class, 'index'])->name('foodlicense_list');
            Route::get('/add-foodlicense', [FoodlicenseController::class, 'addFoodlicense'])->name('add-foodlicense');
            Route::post('/create-foodlicense', [FoodlicenseController::class, 'createFoodlicense'])->name('create-foodlicense');
            Route::get('/edit-foodlicense/{id}', [FoodlicenseController::class, 'editFoodlicense'])->name('edit-foodlicense');
            Route::post('/update-foodlicense', [FoodlicenseController::class, 'updateFoodlicense'])->name('update-foodlicense');


            /**
             * Region Routes
             */
            Route::get('/region-list', [RegionController::class, 'index'])->name('region_list');
            Route::get('/add-region', [RegionController::class, 'addRegion'])->name('add-region');
            Route::post('/create-region', [RegionController::class, 'createRegion'])->name('create-region');
            Route::get('/edit-region/{id}', [RegionController::class, 'editRegion'])->name('edit-region');
            Route::post('/update-region', [RegionController::class, 'updateRegion'])->name('update-region');
            Route::get('/region-status/{id}/{status}', [RegionController::class, 'regionStatus'])->name('region-status');


            /**
             * Country Routes
             */
            Route::get('/country-list', [CountryController::class, 'index'])->name('country_list');
            Route::get('/add-country', [CountryController::class, 'addCountry'])->name('add-country');
            Route::post('/create-country', [CountryController::class, 'createCountry'])->name('create-country');
            Route::get('/edit-country/{id}', [CountryController::class, 'editCountry'])->name('edit-country');
            Route::post('/update-country', [CountryController::class, 'updateCountry'])->name('update-country');

            /**
             * State Routes
             */
            Route::get('/state-list', [StateController::class, 'index'])->name('state_list');
            Route::get('/add-state', [StateController::class, 'addState'])->name('add-state');
            Route::post('/create-state', [StateController::class, 'createState'])->name('create-state');
            Route::get('/edit-state/{id}', [StateController::class, 'editState'])->name('edit-state');
            Route::post('/update-state', [StateController::class, 'updateState'])->name('update-state');
            Route::get('/get-state/{id}', [StateController::class, 'getState'])->name('get-state');

            /**
             * City Routes
             */
            Route::get('/city-list', [CityController::class, 'index'])->name('city_list');
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
            Route::get('/countrytax-status/{id}/{status}', [CountrytaxController::class, 'countrytaxStatus'])->name('countrytax-status');

            Route::get('/get-company-city/{id}', [CityController::class, 'getCompanyCity'])->name('get-company-city');

            Route::get('/get-country-tax/{id}', [CountrytaxController::class, 'getCountryTax'])->name('getCountryTax');
        });

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
         * Branch Routes
         */
        Route::get('/branch-list', [BranchController::class, 'index'])->name('branch_list');
        Route::get('/add-branch', [BranchController::class, 'addBranch'])->name('add-branch');
        Route::post('/create-branch', [BranchController::class, 'createBranch'])->name('create-branch');
        Route::get('/edit-branch/{id}', [BranchController::class, 'editBranch'])->name('edit-branch');
        Route::post('/update-branch', [BranchController::class, 'updateBranch'])->name('update-branch');
        Route::get('/branch-status/{id}/{status}', [BranchController::class, 'branchStatus'])->name('branch-status');

        Route::get('/get-branch/{id}', [BranchController::class, 'getBranch'])->name('get-branch');

        /**
         * Location Routes
         */
        Route::get('/location-list', [LocationController::class, 'index'])->name('location_list');
        Route::get('/add-location', [LocationController::class, 'addLocation'])->name('add-location');
        Route::post('/create-location', [LocationController::class, 'createLocation'])->name('create-location');
        Route::get('/edit-location/{id}', [LocationController::class, 'editLocation'])->name('edit-location');
        Route::post('/update-location', [LocationController::class, 'updateLocation'])->name('update-location');
        Route::get('/location-status/{id}/{status}', [LocationController::class, 'locationStatus'])->name('location-status');

        /**
         * Location Discount Routes
         */
        Route::get('/location-discount-list', [LocationDiscountController::class, 'index'])->name('location-discount-list');
        Route::get('/add-location-discount', [LocationDiscountController::class, 'addLocationDiscount'])->name('add-location-discount');
        Route::post('/create-location-discount', [LocationDiscountController::class, 'createLocationDiscount'])->name('create-location-discount');
        Route::get('/edit-location-discount/{id}', [LocationDiscountController::class, 'editLocationDiscount'])->name('edit-location-discount');
        Route::post('/update-location-discount', [LocationDiscountController::class, 'updateLocationDiscount'])->name('update-location-discount');
        Route::get('/location-discount-status/{id}/{status}', [LocationDiscountController::class, 'LocationDiscountStatus'])->name('location-discount-status');
        
        
        /**
         * Tax Routes
         */
        Route::get('/tax-list', [TaxController::class, 'index'])->name('tax-list');
        Route::get('/add-tax', [TaxController::class, 'addTax'])->name('add-tax');
        Route::post('/create-tax', [TaxController::class, 'createTax'])->name('create-tax');
        Route::get('/edit-tax/{id}', [TaxController::class, 'editTax'])->name('edit-tax');
        Route::post('/update-tax', [TaxController::class, 'updateTax'])->name('update-tax');
        
        /**
         * Location Tax Routes
         */
        Route::get('/location-tax-list', [LocationTaxController::class, 'index'])->name('location-tax-list');
        Route::get('/add-location-tax', [LocationTaxController::class, 'addLocationTax'])->name('add-location-tax');
        Route::post('/create-location-tax', [LocationTaxController::class, 'createLocationTax'])->name('create-location-tax');
        Route::get('/edit-location-tax/{id}', [LocationTaxController::class, 'editLocationTax'])->name('edit-location-tax');
        Route::post('/update-location-tax', [LocationTaxController::class, 'updateLocationTax'])->name('update-location-tax');
        Route::get('/location-tax-status/{id}/{status}', [LocationTaxController::class, 'locationTaxStatus'])->name('location-tax-status');

        /**
         * Area Routes
         */
        Route::get('/area-list', [AreaController::class, 'index'])->name('area_list');
        Route::get('/add-area', [AreaController::class, 'addArea'])->name('add-area');
        Route::post('/create-area', [AreaController::class, 'createArea'])->name('create-area');
        Route::get('/edit-area/{id}', [AreaController::class, 'editArea'])->name('edit-area');
        Route::post('/update-area', [AreaController::class, 'updateArea'])->name('update-area');
        Route::get('/area-status/{id}/{status}', [AreaController::class, 'areaStatus'])->name('area-status');

        /**
         * counter Routes
         */
        Route::get('/counter-list', [CounterController::class, 'index'])->name('counter-list');
        Route::get('/add-counter', [CounterController::class, 'addCounter'])->name('add-counter');
        Route::post('/create-counter', [CounterController::class, 'createCounter'])->name('create-counter');
        Route::get('/edit-counter/{id?}', [CounterController::class, 'editCounter'])->name('edit-counter');
        Route::post('/update-counter', [CounterController::class, 'updateCounter'])->name('update-counter');
        Route::get('/counter-status/{id}/{status}', [CounterController::class, 'areaStatus'])->name('counter-status');
        Route::get('/get-counter-by-branch/{id}', [CounterController::class, 'getCounterByBranch'])->name('get-counter-by-branch');
        

        Route::get('/get-counter/{id}', [CounterController::class, 'getCounter'])->name('getCounter');

        /**
         * counter Routes
         */
        Route::get('/counter-list', [CounterController::class, 'index'])->name('counter-list');
        Route::get('/add-counter', [CounterController::class, 'addCounter'])->name('add-counter');
        Route::post('/create-counter', [CounterController::class, 'createCounter'])->name('create-counter');
        Route::get('/edit-counter/{id?}', [CounterController::class, 'editCounter'])->name('edit-counter');
        Route::post('/update-counter', [CounterController::class, 'updateCounter'])->name('update-counter');
        Route::get('/counter-status/{id}/{status}', [CounterController::class, 'areaStatus'])->name('counter-status');


        /**
         * category Routes
         */
        Route::get('/category-list', [CategoryController::class, 'index'])->name('category-list');
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('create-category');
        Route::get('/edit-category/{id?}', [CategoryController::class, 'editCategory'])->name('edit-category');
        Route::post('/update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
        Route::get('/category-status/{id}/{status}', [CategoryController::class, 'areaStatus'])->name('category-status');
        Route::get('/get-category/{id}', [CategoryController::class, 'getCategory'])->name('get-category');

        /**
         * Dish Routes
         */
        Route::get('/dish-list', [DishController::class, 'index'])->name('dish-list');
        Route::get('/add-dish', [DishController::class, 'addDish'])->name('add-dish');
        Route::post('/create-dish', [DishController::class, 'createDish'])->name('create-dish');
        Route::get('/edit-dish/{id?}', [DishController::class, 'editDish'])->name('edit-dish');
        Route::post('/update-dish', [DishController::class, 'updateDish'])->name('update-dish');
        Route::get('/dish-status/{id}/{status}', [DishController::class, 'dishStatus'])->name('dish-status');

        Route::get('/get-branch-tax/{id}', [DishController::class, 'getBranchTax'])->name('getBranchTax');

        Route::get('/export-dish', [DishController::class, 'exportDish'])->name('exportDish');

        /**
         * Dish Variant Routes
         */
        Route::get('/dishvariant-list/{id}', [DishVariantController::class, 'index'])->name('dishvariant-list');
        Route::get('/add-dishvariant/{id}', [DishVariantController::class, 'addDishVariant'])->name('add-dishvariant');
        Route::post('/create-dishvariant/{id}', [DishVariantController::class, 'createDishVariant'])->name('create-dishvariant');
        Route::get('/edit-dishvariant/{id?}', [DishVariantController::class, 'editDishVariant'])->name('edit-dishvariant');
        Route::post('/update-dishvariant/{id}', [DishVariantController::class, 'updateDishVariant'])->name('update-dishvariant');
        Route::get('/dishvariant-status/{id}/{status}', [DishVariantController::class, 'dishvariantStatus'])->name('dishvariant-status');

        /**
         * Option Variant Routes
         */
        Route::get('/option-list/{id}', [OptionController::class, 'index'])->name('option-list');
        Route::get('/add-option/{id}', [OptionController::class, 'addOption'])->name('add-option');
        Route::post('/create-option', [OptionController::class, 'createOption'])->name('create-option');
        Route::get('/edit-option/{id?}', [OptionController::class, 'editOption'])->name('edit-option');
        Route::post('/update-option', [OptionController::class, 'updateOption'])->name('update-option');
        Route::get('/option-status/{id}/{status}', [OptionController::class, 'optionStatus'])->name('option-status');

        /**
         * Dish Routes
         */
        Route::get('/menu-list', [MenuController::class, 'index'])->name('menu-list');
        Route::get('/add-menu', [MenuController::class, 'addMenu'])->name('add-menu');
        Route::post('/create-menu', [MenuController::class, 'createMenu'])->name('create-menu');
        Route::get('/edit-menu/{id?}', [MenuController::class, 'editMenu'])->name('edit-menu');
        Route::post('/update-menu', [MenuController::class, 'updateMenu'])->name('update-menu');
        Route::get('/menu-status/{id}/{status}', [MenuController::class, 'menuStatus'])->name('menu-status');
        Route::get('/get-menu/{id}', [MenuController::class, 'getMenu'])->name('get-menu');
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
        
        Route::view('/test-dish', "admin-view.test_dish");

        /**
         * extras Routes
         */
        Route::get('/extra-list/{id}', [ExtraController::class, 'index'])->name('extra-list');
        Route::get('/add-extra/{id}', [ExtraController::class, 'addExtra'])->name('add-extra');
        Route::post('/create-extra', [ExtraController::class, 'createExtra'])->name('create-extra');
        Route::get('/edit-extra/{id?}', [ExtraController::class, 'editExtra'])->name('edit-extra');
        Route::post('/update-extra/{id?}', [ExtraController::class, 'updateExtra'])->name('update-extra');
        Route::get('/extra-status/{id}/{status}', [ExtraController::class, 'extraStatus'])->name('extra-status');

        /**
         * addon Routes
         */
        Route::get('/addon-list/{id}', [AddonController::class, 'index'])->name('addon-list');
        Route::get('/add-addon/{id}', [AddonController::class, 'addAddon'])->name('add-addon');
        Route::post('/create-addon', [AddonController::class, 'createAddon'])->name('create-addon');
        Route::get('/edit-addon/{id?}', [AddonController::class, 'editAddon'])->name('edit-addon');
        Route::post('/update-addon/{id?}', [AddonController::class, 'updateAddon'])->name('update-addon');
        Route::get('/addon-status/{id}/{status}', [AddonController::class, 'AddonStatus'])->name('addon-status');
    });
// });
