@extends('layouts.master')

@section('content')
   <h1>{{$client->name}}</h1>

   @foreach ($uniques as $unique)
   	<h1>{{$unique->task_name}}</h1>
   		@foreach ($tasks as $task)
   			@if ($task->task_name === $unique->task_name)
   				<li>{{$task->rate}}</li>
   			@endif
   		@endforeach
   @endforeach

@endsection