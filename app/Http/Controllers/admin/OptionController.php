<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishOption;
use Auth;

class OptionController extends Controller
{
    public function index($id){
        $dish_id = base64_decode($id);
        $option = DishOption::where('dish_id', $dish_id)->get();
        return view('admin-view.dish_option.index', compact('option', 'dish_id'));
    }

    public function addOption($id){
        $dish_id = base64_decode($id);
        return view('admin-view.dish_option.add_option', compact('dish_id'));
    }

    public function createOption(Request $request){

        $request->validate([
            'option_name' => 'required',
            'option_value' => 'required',
            'dish_id' => 'required',
        ],[
            'dish_id.required'=>'Dish field is Required',
        ]);


        $option = new DishOption();
        $option->option_name = $request->option_name;
        $option->option_value = $request->option_value;
        $option->dish_id = $request->dish_id;
        $option->save();

        return redirect()->route('edit-dish', ['id'=>base64_encode($request->dish_id)])->with('success', 'Saved Successfully!');

        return redirect()->route('option-list', ['id'=>22])->with('success', 'Option Added Successfully!');

    }

    public function editOption($id){
        $option = DishOption::find(base64_decode($id));
        return view('admin-view.dish_option.edit_option', compact('option'));
    }

    public function updateOption(Request $request){

        $request->validate([
            'option_name' => 'required',
            'option_value' => 'required',
        ]);

        $option = DishOption::find($request->option_id);
        $option->option_name = $request->option_name;
        $option->option_value = $request->option_value;
        $option->save();

        return redirect()->route('option-list', ['id'=>22])->with('success', 'Changes saved Successfully!');
    }
}
