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

        $check_cart = Cart::where([['dish_id', base64_decode($id)], ['ip_address', request()->ip()]]);
        if($check_cart->exists()){
            $total_quantity = $check_cart->value('quantity');
            $total_quantity = $total_quantity+1;
            $check_cart->update(['quantity' => $total_quantity]);
        } else {
            $add_to_cart = new Cart();
            $add_to_cart->dish_id = $dish->id;
            $add_to_cart->dish_price = $dish->dish_price;
            $add_to_cart->quantity = 1;
            $add_to_cart->total_price = $dish->dish_price;
            $add_to_cart->ip_address = request()->ip();        
            $add_to_cart->save();
        }

        return redirect()->route('dish', [$id])->with('success', 'Dish added to cart successfully');
    }

    public function cart()
    {
        $get_cart = Cart::with('Dish')->where('ip_address', request()->ip())->get();

        return view('user-view.cart', compact('get_cart'));
    }
}
