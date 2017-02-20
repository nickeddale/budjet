@extends('layouts.app')

@section('content')

	<h1>Edit an existing invoice</h1>

	<div class="col-md-12">

		@include('errors.list')

		{!! Form::model($invoice, 
			[ 
				'method' => 'PATCH',
				'route' => ['invoices.update', $invoice],
				'enctype' => 'multipart/form-data'
			]) 
		!!}

			@include('invoices._form', ['submitButonText' => 'Submit Changes'])
			
		{!! Form::close() !!}


	</div>

@endsection

