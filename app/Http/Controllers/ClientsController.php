<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller

{
    public function index() 
    { 
      $clients = Client::all();
      return view('clients.index', compact('clients'));
    }

    public function show(Client $client) 
    { 
      return view('clients.client', compact('client'));
    }

    public function store(Request $request) 
    {
      $client = new Client;
      $client->name = $request->input('client_name');
      $client->save();
      return back();
    }
}
