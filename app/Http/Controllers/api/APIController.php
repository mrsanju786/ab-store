<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use App\Models\License;
use App\Models\CompanyHasRegion;
use App\Models\CategoryHasMenu;
use App\Models\State;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Area;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Location;
use Storage;
use Auth;
use Validator,Redirect,Response;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    //company list
    public function companyList(){
        try {
        //    $companyList = Company::join('licenses','licenses.id','=','companies.food_license_id')
        //                     ->join('countries','countries.id','=','companies.country_id')
        //                     ->join('states','states.id','=','companies.state_id')
        //                     ->join('cities','cities.id','=','companies.city_id')
        //                     ->select('companies.id','companies.company_name','companies.company_logo','companies.company_logo','companies.company_logo','companies.CIN_no','companies.is_active',
        //                             'countries.country_name','states.state_name','cities.city_name','licenses.license_name','licenses.format as licance_format','licenses.alises_name','licenses.example as license_example')
        //                     ->where('companies.is_active',1)
        //                     ->orderBy('companies.id','desc')
        //                     ->get();
            
            $companyList = Company::with(['foodLicense','country','state','cities'])
                                    ->where('is_active',1)
                                    ->orderBy('id','desc')
                                    ->get(); 
            // return   $companyList;             
            return response()->json(['message'=>'Company List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/company/','status'=>true,'data'=>$companyList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }

    //branch list
    public function branchList(Request $request){
        try {
            
           $company_id =  $request->company_id;
           $region_id  =  $request->region_id;
           
           if($region_id){
           
              $company_id = CompanyHasRegion::where('region_id',$region_id )->value('company_id');
           }
        //    $branchList = Branch::join('licenses','licenses.id','=','branches.license_id')
        //                     ->join('countries','countries.id','=','branches.country_id')
        //                     ->join('states','states.id','=','branches.state_id')
        //                     ->join('cities','cities.id','=','branches.city_id')
        //                     ->select('branches.*',
        //                             'countries.country_name','states.state_name','cities.city_name','licenses.license_name','licenses.format as licance_format','licenses.alises_name','licenses.example as license_example')
        //                     ->where('branches.is_active',1)
        //                     ->where('branches.company_id',$company_id)
        //                     ->orderBy('branches.id','desc')
        //                     ->get();
            $branchList = Branch::with(['branchLicense','company','company.country','company.state','company.cities'])
                                ->where('company_id',$company_id)
                                ->where('is_active',1)
                                ->orderBy('id','desc')
                                ->get();
            return response()->json(['message'=>'Branch List!','status'=>true,'data'=>$branchList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }
    //location list
    public function LocationList(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'branch_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $branch_id = $request->branch_id;

            // $locationList = Location::join('branches','branches.id','=','locations.branch_id')
            //                         ->join('countries','countries.id','=','locations.country_id')
            //                         ->join('states','states.id','=','locations.state_id')
            //                         ->join('cities','cities.id','=','locations.city_id')
            //                         ->select('locations.id','locations.address','locations.pincode','locations.vip_percent','locations.vvip_percent',
            //                                 'locations.license_name','locations.license_format','countries.country_name','states.state_name','cities.city_name',
            //                                 'branches.name','branches.branch_code','branches.branch_manager','branches.contact_number','branches.gst_no','branches.license_no')
            //                         ->where('locations.branch_id',$branch_id)
            //                         ->where('locations.is_active',1)
            //                         ->orderBy('id','desc')
            //                         ->get();
            $locationList =  Location::with(['branch','branch.country','branch.state','branch.cities'])
                                        ->where('branch_id',$branch_id)
                                        ->where('is_active',1)
                                        ->orderBy('id','desc')  
                                        ->get();                  
            return response()->json(['message'=>'Location List!','image_url'=>'','status'=>true,'data'=>$locationList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }

    //area list
    public function AreaList(Request $request){
        try {
            
            $validator = Validator::make($request->all(), [
                'location_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $location_id = $request->location_id;

            // $areaList = Area::join('locations','locations.id','=','areas.location_id')
            //                         ->join('branches','branches.id','=','locations.branch_id')
            //                         ->join('countries','countries.id','=','locations.country_id')
            //                         ->join('states','states.id','=','locations.state_id')
            //                         ->join('cities','cities.id','=','locations.city_id')
            //                         ->select('areas.id','areas.area_name','locations.address','locations.pincode','locations.vip_percent','locations.vvip_percent',
            //                                 'locations.license_name','locations.license_format','countries.country_name','states.state_name','cities.city_name',
            //                                 'branches.name','branches.branch_code','branches.branch_manager','branches.contact_number','branches.gst_no','branches.license_no')
            //                         ->where('areas.location_id',$location_id)
            //                         ->where('areas.is_active',1)
            //                         ->orderBy('id','desc')
            //                         ->get();
            $areaList   = Area::with(['location','location.branch','location.branch.country','location.branch.state','location.branch.cities'])
                              ->where('location_id',$location_id)   
                              ->where('is_active',1)
                              ->orderBy('id','desc')   
                              ->get();     

            return response()->json(['message'=>'Area List!','image_url'=>'','status'=>true,'data'=>$areaList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }
     //counter list
     public function counterList(Request $request){
        try {
            
            $validator = Validator::make($request->all(), [
                'area_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $area_id = $request->area_id;

            // $counterList = Counter::join('areas','areas.id','=','counters.area_id')
            //                         ->join('locations','locations.id','=','areas.location_id')
            //                         ->join('branches','branches.id','=','locations.branch_id')
            //                         ->join('countries','countries.id','=','locations.country_id')
            //                         ->join('states','states.id','=','locations.state_id')
            //                         ->join('cities','cities.id','=','locations.city_id')
            //                         ->select('counters.id','counters.counter_name','counters.counter_address','counters.counter_address','counters.tax_no',
            //                                'counters.license_expiry_date','areas.area_name','locations.address','locations.pincode','locations.vip_percent','locations.vvip_percent',
            //                                'locations.license_name','locations.license_format','countries.country_name','states.state_name','cities.city_name',
            //                                'branches.name as branch_name','branches.branch_code','branches.branch_manager','branches.contact_number','branches.license_no','branches.gst_no')
            //                         ->where('counters.area_id',$area_id)
            //                         ->orderBy('counters.id','desc')
            //                         ->get();
            $counterList =  Counter::with(['area','Branch','Branch.country','Branch.state','Branch.cities'])
                                    ->where('area_id',$area_id)
                                    ->orderBy('id','desc')
                                    ->get();
            return response()->json(['message'=>'Counter List!','status'=>true,'data'=>$counterList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }

     //menu list
     public function menuList(Request $request){
        try {
           
            $validator = Validator::make($request->all(), [
                'counter_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            $counter_id = $request->counter_id;

            // $menuList = Menu::join('branches','branches.id','=','menus.branch_id')
            //                 ->join('companies','companies.id','=','menus.company_id')
            //                 ->join('counters','counters.id','=','menus.counter_id')
            //                 ->join('countries','countries.id','=','companies.country_id')
            //                 ->join('states','states.id','=','companies.state_id')
            //                 ->join('cities','cities.id','=','companies.city_id')
            //                 ->select('menus.*','companies.company_name','companies.company_logo','companies.registered_address','companies.pincode',
            //                         'companies.CIN_no','countries.country_name','states.state_name','cities.city_name','branches.name as branch_name','branches.branch_code',
            //                          'branches.branch_manager','branches.contact_number','branches.gst_no',
            //                          'counters.counter_name','counters.counter_address','counters.tax_no','counters.license_no','counters.license_expiry_date')
            //                 ->where('menus.counter_id',$counter_id)
            //                 ->where('menus.is_active',1)
            //                 ->orderBy('menus.id','desc')
            //                 ->get();
            $menuList =  Menu::with(['company','branch'])
                            ->where('counter_id',$counter_id) 
                            ->where('is_active',1)
                            ->orderBy('id','desc')
                            ->get();                     
            return response()->json(['message'=>'Menu List!','status'=>true,'data'=>$menuList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }

    //category list
    public function categoryList(Request $request){
        try {
            
            $validator = Validator::make($request->all(), [
                'menu_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            $menu_id = $request->menu_id;
            //find menu wise multiple category
            $categoryId = CategoryHasMenu::where('menu_id',$menu_id)->pluck('category_id');
            //get category list
            $categoryList = Category::with(['Branch','Counter'])
                                   ->whereIn('id',$categoryId)
                                   ->where('is_active',1)
                                   ->orderBy('id','desc')
                                   ->get();
                                    
            return response()->json(['message'=>'Category List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/category/','status'=>true,'data'=>$categoryList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }
    //dish list
    public function dishList(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'category_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $category_id = $request->category_id;

            $dishList = Dish::with(['counter'])->where('category_id',$category_id)
                            ->where('is_active',1)
                            ->orderBy('id','desc')
                            ->get();
                                    
            return response()->json(['message'=>'Dish List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/dish/','status'=>true,'data'=>$dishList]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
        
    }


    //get counter,menu, category and dish
    public function counterWiseDish(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'branch_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $branch_id = $request->branch_id;
            //get counter list
            $counterList = Counter::where('branch_id',$branch_id)->orderBy('id','desc')->get();
            $menu_list =[];
            foreach($counterList as $value){
                //get menu list
                $menuList = Menu::where('counter_id',$value->id)
                                ->where('is_active',1)
                                ->orderBy('id','desc')
                                ->get();
                $menu_list =   $menuList; 
  
            }
            $category_list =[];
            foreach($menu_list as $value){
                //find menu wise multiple category
                $categoryId = CategoryHasMenu::where('menu_id',$value->id)->pluck('category_id');
                //get category list
                $categoryList = Category::whereIn('id',$categoryId)
                                    ->where('is_active',1)
                                    ->orderBy('id','desc')
                                    ->get();
                $category_list =   $categoryList; 
            }

            $dish_list =[];
            foreach($category_list as $value){
                //get dish list
                $dishList = Dish::where('category_id',$value->id)
                                    ->where('is_active',1)
                                    ->orderBy('id','desc')
                                    ->get();
                $dish_list =   $dishList; 
            }
           
return response()->json(['message'=>'Counter Dish List!','dish_image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/dish/','category_image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/category/','status'=>true,'data'=>['counter_list'=>$counterList,'menu_list'=>$menu_list,'category_list'=>$category_list,'dish_list'=>$dish_list]]);                
        }catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }
    }
   
  
}
