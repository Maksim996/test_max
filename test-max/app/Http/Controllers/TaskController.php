<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function delete($id){
        Task::find($id)->delete();
    }
}
