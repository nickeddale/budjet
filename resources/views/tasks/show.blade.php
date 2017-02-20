@extends('layouts.app')

@section('content')

	<div class="card">
		<h1>{{ $task->taskNumber }}</h1>
		<div class="card-stacked">
			<div class="card-content">
				<ul class="card-collection">
					<li class="collection-item">Owner: {{ $task->ownedBy->name }}</li>
					<li class="collection-item">Task Number: {{ $task->task_number }}</li>
					<li class="collection-item">Description: {{ $task->description }}</li>
					<li class="collection-item">Cost: {{ $task->cost }}</li>
					<li class="collection-item">Invoice: @include('tasks._task-invoice', $task)</li>
					<li class="collection-item">Created On: {{ $task->created_at }}</li>
					<li class="collection-item">Created By: {{ $task->createdBy->name }}</li>
					<li class="collection-item">Updated On: {{ $task->task_number }}</li>
					<li class="collection-item">Updated By: {{ $task->lastUpdateBy->name }}</li>
				</ul>
			</div>
				
			<div class="card-action">
				<a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a>
			</div>
		</div>
	</div>

	

	
	
@stop