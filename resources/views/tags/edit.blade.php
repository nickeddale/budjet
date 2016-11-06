@extends('layouts.app')

@section('content')

	<h1>Edit an existing tag</h1>

	<div class="col-md-6 col-md-offset-3">

		@include('errors.list')

		{!! Form::model($tag, 
			[ 
				'method' => 'PATCH',
				'route' => ['tags.update', $tag],
				'enctype' => 'multipart/form-data'
			]) 
		!!}

			@include('tags._form', ['submitButonText' => 'Submit Changes'])
			
		{!! Form::close() !!}


	</div>

	
	
@stop