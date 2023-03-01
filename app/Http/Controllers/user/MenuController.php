<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Timezone;
use Carbon\Carbon;

class MenuController extends Controller
{
    public function all_menu($id){
        
        $cid = base64_decode($id);
        $menu_detail = Menu::where('counter_id', $cid)->with('company')->first();
        $country_zonename = Timezone::where('country_id', $menu_detail->company->country_id)->first();
        $current_time = Carbon::now($country_zonename->zone_name)->format('H:i');
        $current_day = Carbon::now($country_zonename->zone_name)->format('l');
        
        $menu = Menu::where('counter_id', $cid)
                ->whereRaw("FIND_IN_SET('$current_day', repeat_days)")
                ->where('from_time', '<=', $current_time)
                ->where('to_time', '>', $current_time)
                ->get();
        return view('user-view.menu', compact('menu'));
    }
}
