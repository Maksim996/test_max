<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //
    public function index(){

        // $arr = [
        //     'name' => 'maks',
        //     'id' => 1
        // ];
        $tasks = Task::all();
        return view('layout', [
            'tasks' => $tasks
        ]);
    }
    public function delete($id){
        Task::find($id)->delete();
    }
}
