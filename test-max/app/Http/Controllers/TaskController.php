<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function delete($id){
        Task::find($id)->delete();
    }
    public function save(Request $request){
        $task = new Task;
        $task->name_task = $request->message;
        $task->start_time = $request->startTime;
        $task->end_time = $request->endTime;
        $task->time = $request->time;

        $task->save();
    }
}
