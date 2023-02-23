<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $dish = Dish::where('id', base64_decode($id))->first();

        $add_to_cart = new Cart();
        $add_to_cart->dish_id = $dish->id;
        $add_to_cart->dish_price = $dish->dish_price;
        $add_to_cart->quantity = 1;
        $add_to_cart->total_price = $dish->dish_price;
        $add_to_cart->save();

        return redirect()->route('dish', [$id])->with('success', 'Dish add to cart successfully');
    }

    // public function cart($id)
    // {
    //     $dish = Dish::where('id', base64_decode($id))->first();

    //     $add_to_cart = new Cart();
    //     $add_to_cart->dish_id = $dish->id;
    //     $add_to_cart->dish_price = $dish->dish_price;
    //     $add_to_cart->quantity = 1;
    //     $add_to_cart->total_price = $dish->dish_price;
    //     $add_to_cart->save();

    //     return redirect()->route('dish', [$id])->with('success', 'Dish add to cart successfully');
    // }
}
