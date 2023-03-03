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
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\DishVariant;
use Storage;
use Auth;
use Redirect;
use Response;
use Validator;
use DB;
use Log;

class MobileAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //get counter location wise
    public function getCounterList(Request $request){
        try{

            $validator = Validator::make($request->all(), [
                'pincode'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            $pincode = $request->pincode;
            //get location id
            $location = Location::join('areas','areas.location_id','=','locations.id')
                                ->select('locations.id as location_id','areas.id as area_id','areas.area_name')
                                ->where('locations.pincode',$pincode)
                                ->where('locations.is_active',1)
                                ->first();
            
            //get counter list                    
            $counterList  = Counter::with('Branch')
                                   ->where('area_id',$location->area_id)
                                   ->orderBy('id','desc')
                                   ->get();                    
            return response()->json(['message'=>'Counter List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/company/','status'=>true,'data'=>$counterList]);                                
        }catch (\Throwable $th) {
           
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }  
    }

     //menu list
    public function getMenuList(Request $request){
        try {
           
            $validator = Validator::make($request->all(), [
                'counter_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            $counter_id = $request->counter_id;

            $menuList =  Menu::with(['company','branch'])
                            ->where('counter_id',$counter_id) 
                            ->where('is_active',1)
                            ->orderBy('id','desc')
                            ->get();  

            return response()->json(['message'=>'Menu List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/company/','status'=>true,'data'=>$menuList]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' =>false, 'message' => 'Something went wrong.'], 400);
        }
        
    }

    //category list
    public function getCategoryList(Request $request){
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
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
        
    }

     //dish list
    public function getDishList(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'category_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $category_id = $request->category_id;

            $dishList = Dish::with(['counter','dishVariant'])
                            ->where('category_id',$category_id)
                            ->where('is_active',1)
                            ->orderBy('id','desc')
                            ->get();
           
            $array =[];
            foreach($dishList as $dish){
                $taxPercent =0;
                    $taxName =Null;
                    $dish_tax =0;
                    $discount_percent =0;
                    $discount_name =Null;
                    $discount_dish_amount =0;
                    $tax_with_dish_amount =0;
                    $dish_discount_with_tax=0;
                    $tax=0;
                    $discount=0;
                    //get discount
                    $discount_amount =0;
                    if(!empty($dish->discount_ids)){
                        $discount = DB::table('discounts')
                                        ->where('id',$dish->discount_ids)
                                        ->where('is_active',1)
                                        ->first();  
                                        
                        $discount_percent =$discount->discount_percent;
                        $discount_name    =$discount->discount_name; 
                        $discount_amount  =($dish->dish_price *$discount->discount_percent)/100; 
                        $discount_dish_amount =$dish->dish_price-$discount_amount;
                                          
                    }
                    //dish tax
                    if($dish->is_tax_inclusive ==1){
                        
                        //get tax on dish
                        $dish_has_taxes = DB::table('dish_has_taxes')
                                            ->where('dish_id',$dish->id)
                                            ->first();
                        
                        //country tax  
                        if(!empty($dish_has_taxes)) {
                            $tax = DB::table('country_taxes')
                                        ->where('id',$dish_has_taxes->tax_id)
                                        ->where('is_active',1)
                                        ->first();
                            
                            $taxPercent = $tax->tax_percent;
                            $taxName    = $tax->name; 
                        }
                        $dish_tax  = ($dish->dish_price *$taxPercent) /100;
                        $tax_with_dish_amount =$dish->dish_price+$dish_tax;
                        $dish_discount_with_tax = ($discount_dish_amount * $taxPercent)/100;
                    }
                    //get final price
                    $final_price  = 0;
                    if($discount_dish_amount || $dish_discount_with_tax){
                        $final_price  = $discount_dish_amount +  $dish_discount_with_tax;
                    }elseif($discount_dish_amount){
                        $final_price  = $discount_dish_amount;
                    }elseif($tax_with_dish_amount){
                        $final_price  = $tax_with_dish_amount;
                    }else{
                        $final_price  = $dish->dish_price;
                    }
                //get dish variant 
                $dish_variant = [];
                $variant_price =0;
                $discount_variant_price =0;
                $dishvariant = DishVariant::where('dish_id',$dish->id)->get(); 
                foreach($dishvariant as $variant){
                    
                    if($discount_percent || $taxPercent){
                        $discount_percent =!empty($discount->discount_percent) ? $discount->discount_percent : 0;
                        $taxPercent = !empty($tax->tax_percent) ? $tax->tax_percent :0;
                        $discount_variant_price = $variant->variant_price - ($variant->variant_price * $discount_percent)/100;
                        $variant_price = $discount_variant_price + ($discount_variant_price * $taxPercent)/100;
                    }elseif($discount_percent){
                        $discount_percent =!empty($discount->discount_percent) ? $discount->discount_percent : 0;
                        $variant_price = $variant->variant_price - ($variant->variant_price * $discount_percent)/100;
                    }elseif($taxPercent){
                        $taxPercent = !empty($tax->tax_percent) ? $tax->tax_percent :0;
                        $variant_price = $variant->variant_price + ($variant->variant_price * $taxPercent)/100;
                    }else{
                        $variant_price = $variant->variant_price;
                    }
                    
                    $dish_variant[] = array(
                        "id"           => $variant->id,
                        "variant_name" => $variant->variant_name,
                        "variant_price"=> $variant_price  ?? 0,
                        "dish_id"      => $variant->dish_id,
                        "created_at"   => $variant->created_at,
                        "updated_at"   => $variant->updated_at
                    ); 
                }   
                
                $array[] =array(
                    "id"       => $dish->id,
                    "dish_name"=>$dish->dish_name,
                    "dish_price"=> $final_price ?? Null,
                    "dish_code"=> $dish->dish_code,
                    "dish_images"=> $dish->dish_images,
                    "has_variant"=> $dish->has_variant,
                    "is_tax_inclusive"=> $dish->is_tax_inclusive,
                    "is_discount"=> $dish->is_discount,
                    "category_id"=> $dish->category_id,
                    "counter_id"=> $dish->counter_id,
                    "chef_preparation"=> $dish->chef_preparation,
                    "dish_hsn"=> $dish->dish_hsn,
                    "tax_name"=> $taxName,
                    "tax_percent"=> $taxPercent,
                    "discount_name"=> $discount_name,
                    "discount_percent"=> $discount_percent,
                    "edited_at"=> $dish->edited_at,
                    "edited_by"=> $dish->edited_by,
                    "is_active"=> $dish->is_active,
                    "created_at"=>$dish->created_at,
                    "updated_at"=> $dish->updated_at,
                    'dish_variant'=>$dish_variant ?? Null,
                    'counter'=>$dish->counter ?? Null
                );
            }                        
            return response()->json(['message'=>'Dish List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/dish/','status'=>true,'data'=>$array]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' =>false, 'message' => 'Something went wrong.'], 400);
        }
        
    }
   
    

}
