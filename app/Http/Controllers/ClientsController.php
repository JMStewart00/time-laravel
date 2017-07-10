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
      return view('clients.index', compact('clients'));
    }

    public function show(Client $client) 
    { 
      $tasks = Task::orderBy('task_name')->where('client_id', '=', $client->id)->get();
      $uniques = Task::distinct()->where('client_id', '=', $client->id)->get(['task_name'])->all();
      // dd($uniques);
      $clients = Client::all();
      return view('clients.client', compact('client', 'clients', 'tasks', 'uniques'));
    }

    public function store(Request $request) 
    {
      $client = new Client;
      $client->name = $request->input('client_name');
      $client->save();
      return back();
    }
}
