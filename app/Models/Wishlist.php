<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;
use Auth;

class Wishlist extends Model
{
    use HasFactory;
    public function productSize()
    {
        return $this->hasOne(ProductSizeVariant::class, 'id', 'product_id');
    }

    public function productColor()
    {
        return $this->hasOne(ProductColorVariant::class, 'id', 'product_id');
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
