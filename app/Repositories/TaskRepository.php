<?php
namespace App\Repositories;

// use App\Interfaces;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskRepository implements TaskRepositoryInterface{
    protected $task;
    protected $user;
    public function __construct(Task $task,User $user)
    {   
        $this->task=$task;
        $this->user=$user;
    }
    public function createTask(array $data){
        return $this->task->create($data);
    }
    public function updateTask(array $data,$id){
        return $this->task->findOrFail($id)->update($data);
    }
    public function showTask($id){
        return $this->task->findOrFail($id);
    }
    public function showAllTasks()
    {
        return $this->task->all();
    }
    public function deleteTask($id){
        return $this->task->findOrFail($id)->delete($id);
    }
    public function assignTask(array $data){
        $task = Task::find($data['task_id']);
        if(!$task){
            return response()->json(['message'=>'task is not found']);
        }else{
            return $task->user()->attach([
                'user_id'=>$data['user_id'],
                'task_id'=>$data['task_id'],
                'admin_id'=>auth()->id()
            ]);
        }
        // return $this->task->user()->attach($data);
    }
}