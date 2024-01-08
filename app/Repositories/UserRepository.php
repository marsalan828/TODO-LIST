<?php
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    protected $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function RegisterUser(array $data){
        return $this->user->create($data);
    }
    public function updateUser($id,array $data){
        return $this->user->findOrFail($id)->update($data);
    }
    public function showUser($id){
        return $this->user->findOrFail($id);
    }
    public function deleteUser($id){
        return $this->user->findOrFail($id)->delete();
    }
    public function showAllUsers(){
        return $this->user->all();
    }
}