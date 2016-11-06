@extends('layouts.app')

@section('content')

	<h1>Create a new category </h1>


	<div class="col-md-6 col-md-offset-3">

	@include('errors.list')

		{!! Form::model($category, 
			[ 
				'method' => 'POST',
				'route' => ['categories.store', $category] 
			]) 
		!!}

			@include('categories._form', ['submitButonText' => 'Create a new category'])
			
		{!! Form::close() !!}

	</div>

	
	
@stop