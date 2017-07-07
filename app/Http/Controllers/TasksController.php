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
        $clients = Client::all();
		return view('tasks.index', compact('tasks', 'clients'));
    }

    public function store()
    {
        Task::create(request(['task_name', 'rate', 'client_id']));

    	return back();
    }

}
