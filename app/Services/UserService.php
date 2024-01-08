<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserService extends UserRepository{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    } 

    public function updateUser($id, array $data)
    {
       return $this->userRepository->updateUser($id,$data);
    }

    public function showUser($id)
    {
       return $this->userRepository->showUser($id);
    }
    public function deleteUser($id){
        return $this->userRepository->deleteUser($id);
    }
    public function showAllUsers(){
        return $this->userRepository->showAllUsers();
    }

}