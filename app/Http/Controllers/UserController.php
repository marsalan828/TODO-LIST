<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }

    public function updateUser($id,Request $request){
        try{
            $user = $this->userService->updateUser($id,$request->all());
            return response()->json(['message'=>'user updated successfully','user'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function showUser($id){
        try{
            $user = $this->userService->showUser($id);
            return response()->json(['message'=>'user found successfully','user'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }

    public function deleteUser($id){
        try{
            $user = $this->userService->deleteUser($id);
            return response()->json(['message'=>'use has been deleted successfully','user'=>$user]);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }

    public function showAllUsers(){
        try{
            $user = $this->userService->showAllUsers();
            return response()->json(['users'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
}
