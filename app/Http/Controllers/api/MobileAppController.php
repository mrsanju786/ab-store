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
    //get counter location wise
    public function counterList(Request $request){
        try{
            $pincode = $request->pincode;
            //get location id
            $location = Location::join('areas','areas.location_id','=','locations.id')
                                ->where('pincode',$pincode)
                                ->where('locations.is_active',1)
                                ->first();
            //get area id
            // $area     = Area::where('location_id',$location->id)  
            //                  ->where('is_active',1)                      
        }catch (\Throwable $th) {
           
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }  
    }
}
