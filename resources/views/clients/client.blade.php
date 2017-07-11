@extends('layouts.master')
@section('content')
<h1 class="text-center">{{$client->name}}</h1>
<div class="container text-center">

	@foreach ($uniques as $unique)
		@if ($unique->total_hours > 0)	
			<div class="row" id="taskHeader">
				<div class="col text-left">
					<h2>{{$unique->task_name}}</h2>
				</div>
				<div class="col text-center">
					<h2 class="d-inline-block pr-3">Rate:</h2><h2 style="font-weight: lighter" class="d-inline-block">${{$unique->rate}}</h2>
				</div>
				<div class="col text-right">
					<h2 class="d-inline-block pr-3">Hrs:  </h2><h2 style="font-weight: lighter" class="d-inline-block"> {{sprintf("%.2f", ($unique->total_hours))}}</h2>
				</div>
			</div>


			<div class="row">
				<div class="col">
					<h4>Date</h4>
				</div>
				<div class="col">
					<h4>Start</h4>
				</div>
				<div class="col">
					<h4>End</h4>
				</div>
				<div class="col">
					<h4>Total</h4>
				</div>
			</div>

		@endif

		@foreach ($tasks as $task)




				@if ($task->task_name === $unique->task_name and !is_null($task['clock_out']))
			<div class="row">


				<div class="col">
					<p>{{date("m/d/y",strtotime($task->clock_in))}}</p>
				</div>
				<div class="col">
					<p>{{date("h:i a",strtotime($task->clock_in))}}</p>
				</div>
				<div class="col">
					<p>{{date("h:i a",strtotime($task->clock_out))}}</p>
				</div>
				<div class="col">
					<p>{{sprintf("%.2f",((strtotime($task['clock_out']) - strtotime($task['clock_in'])) / 60) / 60)}}</p>
				</div>


			</div>
				@endif


		@endforeach <!--end of tasks list -->

	@endforeach  <!--end of unique tasks -->

</div>


@endsection