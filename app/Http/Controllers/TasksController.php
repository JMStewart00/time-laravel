<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() 
    {
    	$tasks = Task::latest()->get();
		return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
    	$task = new Task;
    	$task->task_name = $request->input('task_name');
    	$task->rate = $request->input('rate');
    	$task->save();
    	return back();
    }

}
