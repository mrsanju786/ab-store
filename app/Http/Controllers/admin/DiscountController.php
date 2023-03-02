<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Auth;

class DiscountController extends Controller
{
    public function index(){
        $discount = Discount::get();
        return view('admin-view.discount.index', compact('discount'));
    }

    public function addDiscount()
    {
        return view('admin-view.discount.add_discount');
    }

    public function createDiscount(Request $request){

        $request->validate([
            'discount_name' => 'required',
            'discount_percent' => 'required',
        ]);

        $discount = new Discount();
        $discount->discount_name = $request->discount_name;
        $discount->discount_percent = $request->discount_percent;
        $discount->save();

        return redirect()->route('discount_list')->with('success', 'Discount Added Successfully!');

    }

    public function editDiscount($id){
        $discount = Discount::find(base64_decode($id));
        return view('admin-view.discount.edit_discount', compact('discount'));
    }

    public function updateDiscount(Request $request){

        $request->validate([
            'discount_name' => 'required',
            'discount_percent' => 'required',
        ]);

        $id = $request->discount_id;
        $discount = Discount::find($id);
        $discount->discount_name = $request->discount_name;
        $discount->discount_percent = $request->discount_percent;
        $discount->save();

        return redirect()->route('discount_list')->with('success', 'Changes saved Successfully!');
    }

    public function discountStatus(Request $request)
    {
        $size = Discount::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Discount status updated!');
    }
}