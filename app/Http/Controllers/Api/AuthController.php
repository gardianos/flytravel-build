<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login() { 
        
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user->email_verified_at = '';
            return response()->json([
                'status' => 'success',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status'=>'unauthorised'
            ], 401); 
        }
        
    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) { 

        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required', 
            'password_confirmation' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'status' => 'data not valid',
                'errors' => $validator->errors()
            ], 401);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $user->email_verified_at = '';
        return response()->json([
            'status' => 'success',
            'user' => $user
        ], 200);
        
    }

    /**
     * Social login / regsiter
     *
     * @return \Illuminate\Http\Response
     */
    public function social(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user) {
            return response()->json([
                'status' => 'success',
                'user' => $user
            ]);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make(uniqid());
            $user->save();
            return response()->json([
                'status' => 'success',
                'user' => $user
            ]);
        }
    }

}
