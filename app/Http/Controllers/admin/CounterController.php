<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use App\Models\Area;
use App\Models\Location;
use App\Models\Discount;

class CounterController extends Controller
{
    public function index(){

        $counter = Counter::get();
        $area = Area::get();
        return view('admin-view.counter.index', compact('counter','area'));
    }

    public function addCounter()
    {
        $discount = Discount::get();
        $area = Area::where('is_active', 1)->get();
        return view('admin-view.counter.add_counter', compact('area', 'discount'));
    }

    public function createCounter(Request $request){

        $request->validate([
            'counter_name' => 'required',
            'area_id' => 'required',
        ]);

        $counter = new Counter();
        $counter->counter_name = $request->counter_name;
        $counter->license_no = $request->license_no;
        $counter->license_expiry_date = $request->lincese_expiry_date;
        $counter->area_id = $request->area_id;
        $counter->discount_ids = $request->discount_id;
        $counter->save();

        return redirect()->route('counter-list')->with('success', 'Counter Added Successfully!');

    }

    public function editCounter($id){
        $discount = Discount::get();
        $counter = Counter::find(base64_decode($id));
        $area = Area::where('is_active', 1)->get();
        return view('admin-view.counter.edit_counter', compact('counter','area','discount'));
    }

    public function updateCounter(Request $request){

        $request->validate([
            'counter_name' => 'required',
            'area_id' => 'required',
        ]);

        $id = $request->counter_id;
        $counter = Counter::find($id);
        $counter->counter_name = $request->counter_name;
        $counter->license_no = $request->license_no;
        $counter->license_expiry_date = $request->lincese_expiry_date;
        $counter->area_id = $request->area_id;
        $counter->discount_ids = $request->discount_id;
        $counter->save();

        return redirect()->route('counter-list')->with('success', 'Changes saved Successfully!');
    }

    public function getCounterByBranch($id){
        $counter = Counter::where('branch_id', $id)->get();
        return $counter;
    }

    public function getCounter($id){

        $location = Location::where('branch_id', $id)->get('id')->toArray();
        $area = Area::whereIn('location_id', $location)->get('id')->toArray();
        $counter = Counter::whereIn('area_id', $area)->get();
        return $counter;

    }

}
