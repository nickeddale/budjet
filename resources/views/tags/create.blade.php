@extends('layouts.app')

@section('content')

	<h1>Create a new tag </h1>

	<div class="col-md-6 col-md-offset-3">

		@include('errors.list')

		{!! Form::model($tag = new \App\Tag, 
			[ 
				'method' => 'POST',
				'route' => ['tags.store', $tag],
				'enctype' => 'multipart/form-data'
			]) 
		!!}

			@include('tags._form', ['submitButonText' => 'Create a new tag'])
			
		{!! Form::close() !!}


	</div>

	
	
@stop