<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService=$taskService;
    }

    public function createTask(Request $request){
        try{
            $task =$this->taskService->createTask($request->all());
            return response()->json(['message'=>'Task created successfully','Task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function updateTask(Request $request,$id){
        try{
            $updateTask= $this->taskService->updateTask($request->all(),$id);
            return response()->json(['message'=>'Task updated successfully'],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function showTask($id){
        try{
            $task = $this->taskService->showTask($id);
            return response()->json(['task'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function showAllTasks()
    {
        try{
        $task = $this->taskService->showAllTasks();
        return response()->json(['Tasks'=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function deleteTask($id){
        try{
        $task = $this->taskService->deleteTask($id);
        return response()->json(['message'=>'task deleted successfully',''=>$task],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function assignTask(Request $request){
            $data = $request->only(['user_id','task_id']);
            try{
                $result = $this->taskService->assignTask($data);
                return response()->json(['message'=>'Task assigned successfully'],200);
            }catch(\Exception $e){
                return response()->json(['message'=>$e->getMessage()],500);
            }
    }
}
