@extends('layouts.app')

@section('content')

	<h1>Edit an existing category</h1>

	<div class="col-md-6 col-md-offset-3">

		@include('errors.list')

		{!! Form::model($category, 
			[ 
				'method' => 'PATCH',
				'route' => ['categories.update', $category],
				'enctype' => 'multipart/form-data'
			]) 
		!!}

			@include('categories._form', ['submitButonText' => 'Submit Changes'])
			
		{!! Form::close() !!}


	</div>

	
	
@stop