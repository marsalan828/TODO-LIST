<?php
namespace App\Interfaces;

interface UserRepositoryInterface{
    public function RegisterUser(array $data);
    public function updateUser($id,array $data);
    public function showUser($id);
    public function deleteUser($id);
    public function showAllUsers();
}