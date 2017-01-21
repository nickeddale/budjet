@extends('layouts.app')

@section('content')

	<h1>All Tasks</h1>


	<table class="table table-condensed table-striped">

		<tr>

			<th>Task Number</th>
			<th>Task Description</th>
			<th>Cost</th>
			<th>Invoice</th>
			<th>Tags</th>
			<th>Operating Month</th>
			<th>Booked Month</th>
			<th>Created By</th>
			<th>Created On</th>
			<th>Last Updated By</th>
			<th>Last Updated On</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		
		</tr>


		@foreach ($tasks->all() as $task)

			<tr>
			
				<td>{{ $task->task_number }} </td>
				<td>{{ $task->description }} </td>
				<td>{{ $task->cost }} </td>
				<td>
					@unless( is_null($task->invoices))
						<a href="{{ route('invoices.show', ['id' => $task->invoice_id ]) }}">
						{{$task->invoices->invoice_number}}
						</a> 
					@else
						No invoice found
					@endunless
				</td>
				<td>
					@include('tags._label', $tags = $task->tags)
				</td>
				<td>{{ $task->operating_month }} </td>
				<td>{{ $task->booked_month }} </td>
				<td>{{ $task->createdBy->name }} </td>
				<td>{{ $task->created_at }} </td>
				<td>{{ $task->lastUpdateBy->name }} </td>
				<td>{{ $task->updated_at }} </td>
				<td><a href="{{ route('tasks.show', ['id' => $task->id]) }}">View Task</a> </td>
				<td><a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a> </td>
				<td>@include('tasks/_delete')</td>

			</tr>

		@endforeach

	</table>

@stop