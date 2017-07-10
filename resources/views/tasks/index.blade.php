@extends('layouts.master')

@section('content')

@if (session()->has("success"))
	<h2>success</h2>
@endif
@foreach ($errors->all() as $error)
<p>{{$error}}</p>
@endforeach

{{$pendingTask}}
<table class="table">
	<thead>
		<tr>
			<th>Date</th>
			<th>Client</th>
			<th>Task Name</th>
			<th>Duration</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
@foreach ($tasks as $task)
		<tr>
			<td>{{ $task->created_at->toFormattedDateString() }}</td>
			<td>Need to add client</td>
			<td>{{ $task->task_name }}</td>
			<td>{{ sprintf("%.2f",((strtotime($task['clock_out']) - strtotime($task['clock_in'])) / 60) / 60)}} hrs</td>
			<td></td>
		</tr>
@endforeach
	</tbody>
</table>

@endsection


