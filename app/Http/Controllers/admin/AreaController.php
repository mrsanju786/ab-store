<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Location;
use Auth;

class AreaController extends Controller
{
    public function index(){

        $area = Area::get();
        return view('admin-view.area.index', compact('area'));
    }

    public function addArea(){

        $location = Location::get();
        return view('admin-view.area.add_area', compact('location'));
    }

    public function createArea(Request $request){

        $request->validate([
            'area_name' => 'required',
            'location_id' => 'required',
        ],[
            'area_name.required'=>'Area Name is Required',
            'location_id.required'=>'location Id is Required',
        ]);

        $area = new Area();
        $area->area_name = $request->area_name;
        $area->location_id = $request->location_id;
        $area->save();

        return redirect()->route('area_list')->with('success', 'Area Added Successfully!');

    }

    public function editArea($id){

        $area = Area::find(base64_decode($id));
        $location = Location::get();
        return view('admin-view.area.edit_area', compact('area','location'));
    }

    public function updateArea(Request $request){

        $request->validate([
            'area_name' => 'required',
            'location_id' => 'required',
        ],[
            'area_name.required'=>'Area Name is Required',
            'location_id.required'=>'Location Id is Required',
        ]);

        $area = Area::find($request->area_id);
        $area->area_name = $request->area_name;
        $area->location_id = $request->location_id;
        $area->save();

        return redirect()->route('area_list')->with('success', 'Changes saved Successfully!');
    }

    public function areaStatus(Request $request)
    {
        $area = Area::find($request->id);
        $area->is_active = $request->status;
        $area->save();
        return redirect()->back()->with('success','Area status updated!');
    }
}

