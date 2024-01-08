<?php
namespace App\Services\Auth;
use Illuminate\Support\Facades\Auth;

class AuthLoginService{
    public function login($request){
        if(!Auth::attempt($request)){
            return response()->json(['message'=>'login unsuccessful']);
        }
        
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json(['message'=>'login successful','token'=>$token],200);
        
    }
}