<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;
use App\Models\Product;
use Auth;

class Wishlist extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public static function countWishlist($product_id){
       $wishlist = Wishlist::where(['user_id'=>Auth::id(),'product_id'=>$product_id])->count();
       return $wishlist;
    }
    public static function countWishlistproduct($product_id,$user_id ){
        $wishlistproductapi = Wishlist::where(['user_id'=>$user_id,'product_id'=>$product_id])->count();
        return $wishlistproductapi;
     }
}
