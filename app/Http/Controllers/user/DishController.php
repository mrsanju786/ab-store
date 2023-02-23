<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function categoryDish($id)
    {
        $category_dish = Dish::where('category_id', base64_decode($id))->get();
        return view('user-view.category_dish', compact('category_dish'));
    }

    public function dish($id)
    {
        $dish = Dish::where('id', base64_decode($id))->get();
        return view('user-view.dish', compact('dish'));
    }
}
