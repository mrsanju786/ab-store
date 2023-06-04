<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;
use App\Models\Subscribe;
use App\Models\ContactUs;
use Auth;
use Validator,Redirect,Response;
use App\Models\Review;
use App\Models\BillingAddress;

class HomeController extends Controller
{
    public function home()
    {
        $banner   = Banner::where('status',1)->orderBy('id','desc')->get();
        $category = Category::where('status',1)->limit('5')->get();
        $newProduct       = Product::with(['productSize','productColor','category'])->where('product_type',4)->where('status',1)->orderBy('id','desc')->limit('8')->get();
        $featuredProduct  = Product::with(['productSize','productColor','category'])->where('product_type',2)->where('status',1)->orderBy('id','desc')->limit('8')->get();
        $categoryList = Category::where('status',1)->get();
        return view('frontend/home',compact('banner','category','newProduct','featuredProduct','categoryList'));
    }

    public function category($id)
    {
        $products  = Product::with(['productSize','productColor','category'])
                                ->where('status',1)
                                ->where('category_id',base64_decode($id))
                                ->orderBy('id','desc')
                                ->get();

        // $category = Category::where('status',1)->orderBy('id','desc')->get();
        return view('frontend/category',compact('products'));
    }

    public function Products()
    {
        $products  = Product::with(['productSize','productColor','category'])
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->get();

        return view('frontend/product',compact('products'));
    }

    public function ProductDetails($id)
    {
        $productDetail  = Product::with(['productSize','productColor','category'])
                                ->where('id',base64_decode($id))
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();
                                
        $relatedProduct = Product::with(['productSize','productColor','category'])
                                ->where('category_id',$productDetail->category_id)
                                ->whereNotIn('id',[$productDetail->id])
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();
        $product_data = ProductColorVariant::where('product_id', $productDetail->id)->where('status',1)->get();    
        $single_product_data = ProductColorVariant::where('product_id', $productDetail->id)->where('status',1)->first();              
        return view('frontend/product_detail',compact('productDetail','relatedProduct','product_data','single_product_data'));
    }

    public function ProductColor($id,$color)
    {
        $productDetail  = Product::with(['productSize','productColor','category'])
                                ->where('id',base64_decode($id))
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();
        $relatedProduct = Product::with(['productSize','productColor','category'])
                                ->where('category_id',$productDetail->category_id)
                                ->whereNotIn('id',[$productDetail->id])
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();
        $product_data = ProductColorVariant::where('product_id', $productDetail->id)->where('status',1)->get();    
        $single_product_data = ProductColorVariant::where('product_id', $productDetail->id)->where('id',$color)->where('status',1)->first();              
        return view('frontend/new_product_detail',compact('productDetail','relatedProduct','product_data','single_product_data'));
    }
    public function subscribe(Request $request)
    {
        $newsletters = new Subscribe;
        $newsletters->email = $request->email;
        $newsletters->save();
        
        return redirect()->back()->with('success', 'User subscribed successfully!');
       
    }

    public function contactUs(){
        
        return view('frontend.contact');

    }

    public function addContactUs(Request $request){
       
        request()->validate([
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'nullable', 
        ]);
       
        $contactUs = new ContactUs;
        $contactUs->user_id = Auth::id() ? Auth::id() : 0;
        $contactUs->name    = $request->name;
        $contactUs->email   = $request->email;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->save();

        return redirect()->back()->with('success', 'Conatct form submitted successfully!');
     

    }

    public function addReview(Request $request, $id)
    {

        $alreadyRating = Review::where('user_id', Auth::id())->where('product_id', $id)->first();
        if ($alreadyRating) {
            return redirect()->back()->with('success', 'You have already review for this product!');
            
        }
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:100',
            'comment'   => 'required',
            'rating'    => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Rating field is required ?');
           
        }else{
            $product = Product::where('id', $id)->first();
            $reviews = new Review;
            $reviews->name       = $request->name;
            $reviews->rating     = $request->rating;
            $reviews->comment    = $request->comment;
            $reviews->product_id = $product->id;
            $reviews->user_id    = Auth::id();
            $reviews->save();
            return redirect()->back()->with('success', 'Review added successfully!');
           
        }
        
    }

    public function checkProductSize(Request $request){
        $original_price =0;
        $product_data = ProductSizeVariant::where('id', $request->product_size)->where('status',1)->firstOrFail();
        $product_color = ProductColorVariant::where('id', $request->product_color)->where('status',1)->firstOrFail();
        $price =0;
        $price =$product_color->extra_amount;
        $original_price = $product_data->offer_price-$price;
        if(!empty($product_data)){
            return response()->json(['product_data'=>$product_data,'original_price'=>$original_price]);
        }else{
            return response()->json(['product_data'=>[]]);
        }
        
    } 

    public function checkProductColor(Request $request){
        $product_data = ProductColorVariant::where('id', $request->product_color)->where('status',1)->firstOrFail();
        $image =Null;
        $image.='<div class="tp-product-details-nav-main-thumb"><img src="http://localhost/demo/demo/storage/app/public/upload/product/{{$product_data->image}}" alt=""></div>';
        if(!empty($product_data)){
            return response()->json(['product_data'=>$product_data ,'image' =>$image]);
        }else{
            return response()->json(['product_data'=>[]]);
        }
        
    } 

    public function myWishlist(){
        $wihslistProduct = Wishlist::with('ProductSize','ProductColor')->where('user_id',Auth::id())->get();
       
        return view('frontend.wishlist',compact('wihslistProduct'));

    }

    public function addFavouriteProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $wishlistCount = Wishlist::countWishlist($data['product_id']);
            $whishlistProduct = new Wishlist;
            if (Auth::user()) {
                if ($wishlistCount == 0) {
                    $whishlistProduct->product_id = $data['product_id'];
                    $whishlistProduct->user_id    = $data['user_id'];
                    $whishlistProduct->save();
                    $wish_cnt = Wishlist::where('user_id' ,Auth::user()->id)->count();

                    return response()->json(['action' => 'add', 'message' => 'Product added successfully to wishlist!', 'wish_cnt'=>$wish_cnt]);
                } elseif ($wishlistCount != 0) {

                    Wishlist::where(['user_id' => Auth::id(), 'product_id' => $data['product_id']])->delete();
                    $wish_cnt = Wishlist::where('user_id' ,Auth::user()->id)->count();
                    
                    return response()->json(['action' => 'remove', 'message' => 'Product removed successfully from wishlist!', 'wish_cnt'=>$wish_cnt]);
                }
            } else {
                return response()->json(['action' => 'error', 'message' => 'User not login!']);
            }
        } else {
            $cart_id = $request->cart_id;
            $user_id = $request->user_id;
            $product_id = $request->product_id;

            $wishlistCount = Wishlist::countWishlist($product_id);
            $whishlistProduct = new Wishlist;
            if (Auth::user()) {
                if ($wishlistCount == 0) {
                    $whishlistProduct->product_id = $product_id;
                    $whishlistProduct->user_id    = $user_id;
                    $whishlistProduct->save();

                    Cart::where('id', $cart_id)->limit(1)->delete();
                    Toastr::success('Product added to Wishlist successfully!');
                    return redirect()->back();
                } elseif ($wishlistCount != 0) {
                    Cart::where('id', $cart_id)->limit(1)->delete();
                    Toastr::success('Product added to Wishlist successfully!');
                    return redirect()->back();
                }
            } else {
                return response()->json(['action' => 'error', 'message' => 'User not login!']);
            }
        }
    }



    public function edit($id){
        $address = BillingAddress::where('id',$id)->first();
        $user    = User::where('id',$$address->user_id)->first();
        return view('frontend.saved_address',compact('address','user'));
    }

    public function update(Request $request){
      
        $request->validate([
            'address'   => 'required|max:255',
            'country'   => 'required|max:255',
            'state'     => 'required|max:255',
            'city'      => 'required|max:255',
            'pincode'   => 'required|numeric',
           
        ]);
       
        $addresses = new BillingAddress;
        $addresses->user_id      = Auth::id();
        $addresses->address      = $request->address;
        $addresses->address_type = 1;
        $addresses->primary_addr = 1;
        $addresses->pincode      = $request->pincode;
        $addresses->country      = $request->country;
        $addresses->state        = $request->state;
        $addresses->city         = $request->city;
        $addresses->save();
      
        return redirect()->back()->with('success', 'My address added successfully!');
      
    }


}
