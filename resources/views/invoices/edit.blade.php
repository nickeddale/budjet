@extends('layouts.app')

@section('content')

	<h1>Edit an existing invoice</h1>

	<div class="col-md-6">

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
	
	<div class="col-md-3">

			<object class="pdf-preview" data="{{ URL::route('file_preview', [$invoice->invoice_file]) }}" type="application/pdf" ">
				<iframe src="{{ URL::route('file_preview', [$invoice->invoice_file]) }}" width="100%" height="100%" style="border: none;">
				This browser does not support PDFs. Please download the PDF to view it: <a href="/pdf/sample-3pp.pdf">Download PDF</a>
				</iframe>
			</object>

	</div>

@endsection

@section('styles')

<style>
	
	.pdf-preview {

		height: 600px;
		width: 400px;
	}
</style>


	
@stop

