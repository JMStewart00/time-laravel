<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Task;

class ClientsController extends Controller

{
    public function index() 
    { 
      $clients = Client::all();
      $tasks = Task::all();
      return view('clients.index', compact('clients', 'tasks'));
    }

    public function show(Client $client) 
    { 
      $tasks = Task::orderBy('task_name')->orderBy('clock_in', 'desc')->where('client_id', '=', $client->id)->get();
      
      $uniques = Task::distinct()->where('client_id', '=', $client->id)->get(['task_name'])->all();
      
      foreach($uniques as $unique) {
            $unique['total_hours'] = 0;
            $unique['rate'] = 0;
            foreach($tasks as $task) {
              if ($task->task_name === $unique->task_name && !is_null($task->clock_out)) {
                $unique['rate'] = $task->rate;
                $unique['total_hours'] += ((strtotime($task->clock_out) - strtotime($task->clock_in)) / 60) / 60;
              } 
            }

          }      
      $clients = Client::all();
      
      return view('clients.client', compact('client', 'clients', 'tasks', 'uniques'));
    } // end show()

    public function store(Request $request) 
    {
      $client = new Client;
      $client->name = $request->input('client_name');
      $client->save();
      return back();
    }

    public function patch(){
      return "patch";
    }
    public function destroy($id){
      Client::find($id)->delete();
      Task::where('client_id', '=', $id)->delete();
      return back();
    }

}
