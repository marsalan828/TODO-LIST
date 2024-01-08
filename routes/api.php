<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-task',[TaskController::class,'createTask']);
Route::put('update-task',[TaskController::class,'updateTask']);
Route::get('show-task',[TaskController::class,'showTask']);
Route::get('show-all-tasks',[TaskController::class,'showAllTasks']);
Route::delete('delete-task',[TaskController::class,'deleteTask']);
Route::post('assign-task',[TaskController::class,'assignTask']);

// Route::post();
Route::get('show-user',[UserController::class,'showUser']);
Route::get('show-all-user',[UserController::class,'showAllUsers']);
Route::put('update-user',[UserController::class,'updateUser']);
Route::delete('delete-user',[UserController::class,'deleteUser']);
