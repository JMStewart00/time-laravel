<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use ValidatesRequests;

use App\Task;
use App\Client;

class TasksController extends Controller
{
    public function index() 
    {
        $pendingTask = Task::whereNull('clock_out')->get();
        $tasks = Task::latest()->get();
        $clients = Client::all();

        return view('tasks.index', compact('tasks', 'clients', 'pendingTask'));
    }

    public function store(Request $request)
    {   
        $this->validate(request(), [
            'task_name' => 'required|string|max:50',
            'rate' => 'required|integer',
            'client_id' => 'required|integer',
        ]);
        
        Task::create(request(['task_name', 'rate', 'client_id']));
        session()->flash("success", "Added Task");
        return back();
    }

    public function messages (){
        return [
            'client_id.integer' => 'Please select a client...'
        ];
    }


}
