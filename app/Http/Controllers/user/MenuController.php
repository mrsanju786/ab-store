<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function all_menu($id){
        
        $cid = base64_decode($id);
        $menu = Menu::where('counter_id', $cid)->get();
        return view('user-view.menu', compact('menu'));
    }
}
