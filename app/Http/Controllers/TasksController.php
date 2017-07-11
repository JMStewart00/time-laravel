<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Task;
use App\Client;

class TasksController extends Controller
{
    public function index(Client $client) 
    {

        //$pendingTask = Task::whereNull('clock_out')->get();
        $tasks = Task::orderBy('clock_in', 'desc')->get();
        $clients = Client::all();
        // dd($clients);
        return view('tasks.index', compact('tasks', 'clients'));
    }

    public function store(Request $request)
    {   
        $this->validate(request(), [
            'task_name' => 'required|string|max:50',
            'rate' => 'required|integer',
            'client_id' => 'required|integer',
        ]);
        
        Task::create(request(['task_name', 'rate', 'client_id']));

        session()->flash("_runningtask", array(
            'task_name' => request('task_name'), 
            'client_id' => request('client_id'), 
            'rate' => request('rate'), 
            ));
        return back();
    }

    public function patch(){
        $id = Task::whereNull('clock_out')->pluck("id")->first();
        $task = Task::find($id);
        $task->clock_out = Carbon::now();
        $task->task_name = request('task_name');
        $task->rate = request('rate');
        $task->client_id = request('client_id');
        $task->save();
        return back();
    }

    public function autocomplete(Request $request)
    {
        $term=$request->term;
        $data = Task::distinct()->where('task_name','LIKE','%'.$term.'%')->get(['task_name']);
        $result=array();
        foreach ($data as $key => $v){
            $result[]=['value' =>$v->task_name];
        }
        return response()->json($result);
    }





}
