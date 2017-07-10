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
      $tasks = Task::latest()->get();
      $clients = Client::all();
      return view('clients.client', compact('client', 'clients', 'tasks'));
    }

    public function store(Request $request) 
    {
      $client = new Client;
      $client->name = $request->input('client_name');
      $client->save();
      return back();
    }
}
