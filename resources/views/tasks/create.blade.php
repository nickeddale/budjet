@extends('layouts.app')

@section('content')

	<h1>Create a new task </h1>


	<div class="col-md-6 col-md-offset-3">

	@include('errors.list')

		{!! Form::model($task, 
			[ 
				'method' => 'POST',
				'route' => ['tasks.store', $task] 
			]) 
		!!}

			@include('tasks._form', ['submitButonText' => 'Create a new task'])
			
		{!! Form::close() !!}

	</div>

	
	
@stop