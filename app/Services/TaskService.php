<?php
namespace App\Services;

use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class TaskService extends TaskRepository{
    protected $taskRepository;
    protected $userRepository;
    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository=$taskRepository;
        $this->userRepository=$userRepository;
    }
    public function createTask(array $data){
        $validator = Validator::make($data,[
            'title'=>'required | string | max:255',
            'description'=>'required | string',
            'start_time'=>'required | date',
            'end_time'=>'required | date'
        ]);
        if(!$validator){
            return response()->json(['error'=>$validator->errors()]);
        }else{
            return $this->taskRepository=TaskRepository::createTask([
                'title'=>$data['title'],
                'description'=>$data['description'],
                'start_time'=>$data['start_time'],
                'end_time'=>$data['end_time'],
            ]);
        }
    }

    public function updateTask(array $data, $id)
    {
        return $this->taskRepository->updateTask($data,$id);
    }

    public function showTask($id)
    {
        $task = $this->taskRepository->showTask($id);
        if(!$id){
            return response()->json(['message'=>'Task does not exist'],400);
        }else{
        return response()->json(['message'=>'Task found successfully','message'=>$task],200);

        }
    }
    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }

    public function assignTask(array $data)
    {
       return $this->taskRepository->assignTask($data);
    }

}