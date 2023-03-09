<?php

namespace App\Http\Controllers\api\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\BusinessSetting;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        try{
            $restaurant_name = BusinessSetting::where('key', 'restaurant_name')->first();
        
            return response()->json(['message'=>'Restaurant name!','status'=>true,'data'=>$restaurant_name]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
        
    }

}
