@extends('layouts.master')

@section('content')
@foreach ($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
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
	@if (!is_null($task['clock_out']))
		<tr>
			<td>{{ date("m/d/Y", strtotime($task->clock_in)) }}</td>
			<td>Need to add client</td>
			<td>{{ $task->task_name }}</td>
			<td>{{ sprintf("%.2f",((strtotime($task['clock_out']) - strtotime($task['clock_in'])) / 60) / 60)}} hrs</td>
			<td></td>
		</tr>
	@endif	
@endforeach
	</tbody>
</table>

@endsection


