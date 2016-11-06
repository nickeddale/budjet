@extends('layouts.app')

@section('content')

	<h1>Create a new invoice </h1>

	<div class="col-md-6 col-md-offset-3">

		@include('errors.list')

		{!! Form::model($invoice = new \App\Invoice, 
			[ 
				'method' => 'POST',
				'route' => ['invoices.store', $invoice],
				'enctype' => 'multipart/form-data'
			]) 
		!!}

			@include('invoices._form', ['submitButonText' => 'Create a new invoice'])
			
		{!! Form::close() !!}


	</div>

	
	
@stop