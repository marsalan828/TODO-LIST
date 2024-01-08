<?php
namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class AuthRegistrationService{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    }

    public function RegisterUser(array $data){
        try{
            $validator = Validator::make($data,[
                'name'=> 'required | string | max:255',
                'is_admin'=> 'required | boolean',
                'email'=> 'required | email',
                'password'=> 'required | min:8'
            ]);
            if(!$validator){
                return response()->json(['error'=>$validator->errors()]);
            }else{
                return $this->userRepository->RegisterUser([
                    'name'=>$data['name'],
                    'is_admin'=>$data['is_admin'],
                    'email'=>$data['email'],
                    'password'=>bcrypt($data['password'])
                ]);
            }
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
}