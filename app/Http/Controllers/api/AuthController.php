<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator,Redirect,Response;
use Session, Artisan;
use App\Models\User;
use App\Hepler\Helpers;
use DB;
use Log;

class AuthController extends Controller
{
    

    //register users
    public function register(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'first_name'    => 'required|max:100',
                'last_name'     => 'required|max:100',
                'email'         => 'required|email|unique:users,email|max:100',
                'phone'         => 'required|max:100',
                'password'      => 'required|min:6',
            ]);

            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->phone      = $request->phone;
            $user->is_admin   = 2;
            $user->password   = bcrypt($request->password);
            $user->save();

            return response()->json(['message'=>'User register Successfully!','status'=>true,'data'=>$user]);
        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
    //login users
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
        
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); 
                if($user->is_admin==2){
                    $token = $user->createToken('demo')->accessToken;
                }
                
            
                return response()->json(['message'=>'User Login Successfully!','status'=>true,'token'=>$token,'data'=>$user]);
            
            }
            return response()->json(['message'=>'Email and Password is worng!','status'=>false]);
        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
    
    //user logout
    public function logout() {
        Session::flush();
        Auth::guard('web')->logout();
        return response()->json(['message'=>'User Logout successfully!','status'=>true]);
    }
}
