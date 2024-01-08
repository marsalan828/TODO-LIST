<?php
namespace App\Services\Auth;
use Illuminate\Support\Facades\Auth;

class AuthLoginService{
    public function login($data){
        if(!Auth::attempt($data)){
            return response()->json(['message'=>'login unsuccessful']);
        }else{
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json(['message'=>'login sucessful','token'=>$token],200);
        }
    }
}