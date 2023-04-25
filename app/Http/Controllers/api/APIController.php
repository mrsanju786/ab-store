<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Storage;
use Auth;
use Redirect;
use Response;
use Validator;
use DB;
use Log;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
   
    public function categoryList(){
        try{
              $categoryList =  Category::orderBy('id','desc')->get();
              return response()->json(['message'=>'Category List!','status'=>true,'data'=>$categoryList]);
        }catch (\Throwable $th) {
                DB::rollback();
                Log::debug($th);
                return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
    
    //product list
    public function productList(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'category_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            $category_id  = $request->category_id;
            $category = Product::where('category_id',$category_id)->first();

            if(empty($category)){
                return response()->json(['status' => false, 'message' => 'Category id Not Found.'], 400);
            }

            $productList =  Product::with('category')
                                    ->where('category_id',$category_id)
                                    ->orderBy('id','desc')
                                    ->get();
            return response()->json(['message'=>'Product List!','image_url'=>'http://localhost/demo/storage/app/public/upload/product/','status'=>true,'data'=>$productList]);
        }catch (\Throwable $th) {
                DB::rollback();
                Log::debug($th);
                return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

        //product details
        public function productDetails(Request $request){
            try{
                $validator = Validator::make($request->all(), [
                    'product_id'    => 'required',
                ]);
    
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all() ]);
                }
                $product_id  = $request->product_id;
                $product = Product::where('id',$product_id)->first();
                
                if(empty($product)){
                    return response()->json(['status' => false, 'message' => 'Product id Not Found.'], 400);
                }
                $product_id  = $request->product_id;
                $productDetail =  Product::with('category')
                                        ->where('id',$product_id )
                                        ->orderBy('id','desc')
                                        ->first();
                return response()->json(['message'=>'Product Detail!','image_url'=>'http://localhost/demo/storage/app/public/upload/product/','status'=>true,'data'=>$productDetail]);
            }catch (\Throwable $th) {
                    DB::rollback();
                    Log::debug($th);
                    return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
            }
        }

        public function searchProduct(Request $request){
            try{
                $title  = $request->title;
                $slug   = $request->slug;
                
                if($title){
                    $product =  Product::with('category')
                                            ->where('title',$title)
                                            ->orderBy('id','desc')
                                            ->get();
                }elseif($slug){
                    $product =  Product::with('category')
                                            ->where('slug',$slug)
                                            ->orderBy('id','desc')
                                            ->get();
                }else{
                    $product =  Product::with('category')
                                            ->orderBy('id','desc')
                                            ->get();
                }
                
                return response()->json(['message'=>'Search Product!','status'=>true,'data'=>$product]);
            }catch (\Throwable $th) {
                    DB::rollback();
                    Log::debug($th);
                    return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
            }
        }
   
}
