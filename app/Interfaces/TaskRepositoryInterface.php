<?php
namespace App\Interfaces;

interface TaskRepositoryInterface{
    public function createTask(array $data);
    public function updateTask(array $data,$id);
    public function showTask($id);
    public function showAllTasks();
    public function deleteTask($id);
    public function assignTask(array $data);
}

