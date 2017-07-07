@extends('layouts.master')

@section('content')


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
			<td></td>
			<td> </td>
		</tr>
@endforeach
	</tbody>
</table>

@endsection


