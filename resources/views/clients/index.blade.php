@extends('layouts.master')

@section('content')
   <form method="post" action="/clients">
      {{ csrf_field() }}
      <input name="client_name" type="text">
      <button type="submit">Add</button>
   </form>
   <ul>
      @foreach ($clients as $client)
         <li><a href="/clients/{{$client->id}}">{{$client->name}}</a></li>
      @endforeach
   </ul>

@endsection