@extends('layouts.app')

@section('content')

	<h1>Edit an existing task </h1>

	<div class="col-md-6 col-md-offset-3">

		@include('errors.list')

		{!! Form::model($task, 
			[ 
				'method' => 'PATCH',
				'route' => ['tasks.update', $task] 
			]) 
		!!}

			@include('tasks._form', ['submitButonText' => 'Submit changes'])
			
		{!! Form::close() !!}

	</div>

	
	
@stop