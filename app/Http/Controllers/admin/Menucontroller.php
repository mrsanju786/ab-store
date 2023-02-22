<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Company;

class Menucontroller extends Controller
{
    public function index(){

        $menu = Menu::get();
        return view('admin-view.menu.index', compact('menu'));
    }

    public function addMenu(){

        $company = Company::get();
        return view('admin-view.menu.add-menu', compact('company'));
    }

    public function createMenu(Request $request){

        $request->validate([
            'company_id' => 'required',
            'branch_id' => 'required',
            'counter_id' => 'required',
            'menu_name' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'off_time' => 'required',
            'repeat_days' => 'required',

        ]);

        $menu = new Menu();
        $menu->company_id = $request->company_id;
        $menu->branch_id = $request->branch_id;
        $menu->counter_id = $request->counter_id;
        $menu->menu_name = $request->menu_name;
        $menu->from_time = $request->from_time;
        $menu->to_time = $request->to_time;
        $menu->offtime = $request->off_time;
        $menu->repeat_days = implode(",", $request->repeat_days);
        
        $menu->save();

        return redirect()->route('menu-list')->with('success', 'Menu Added Successfully!');
        
    }

    public function editMenu($id){

        $menu = Menu::find(base64_decode($id));
        $company = Company::get();
        return view('admin-view.menu.edit-menu', compact('menu','company'));
    }

    public function updateMenu(Request $request){

        $request->validate([
            'company_id' => 'required',
            'branch_id' => 'required',
            'counter_id' => 'required',
            'menu_name' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'off_time' => 'required',
            'repeat_days' => 'required',

        ]);

        $id = $request->menu_id;
        $menu = Menu::find($id);
        $menu->company_id = $request->company_id;
        $menu->branch_id = $request->branch_id;
        $menu->counter_id = $request->counter_id;
        $menu->menu_name = $request->menu_name;
        $menu->from_time = $request->from_time;
        $menu->to_time = $request->to_time;
        $menu->offtime = $request->off_time;
        $menu->repeat_days = implode(",", $request->repeat_days);
        $menu->save();
        
        return redirect()->route('menu-list')->with('success', 'Menu Updated Successfully!');
    }

    public function menuStatus(Request $request)
    {
        $menu = Menu::find($request->id);
        $menu->is_active = $request->status;
        $menu->save();
        return redirect()->back()->with('success','Menu status updated!');
    }

    public function getMenu($id){
        $menu = Menu::where('counter_id', $id)->get();
        return $menu;
    }
}
