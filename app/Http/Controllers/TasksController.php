<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Client;

class TasksController extends Controller
{
    public function index() 
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store()
    {
        // dd(request()->all());
        Task::create(request(['task_name', 'rate']));
        return back();

    }


}
