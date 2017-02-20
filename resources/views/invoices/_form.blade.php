<div class="card s12 m7">

	<div class="card horizontal">
		<div class="card-image">
			@include('invoices._file-preview', $invoice)
		</div>

		<div class="card-stacked">

			<div class="card-content">

				<div class="input_field">
					{!! Form::label('invoice_number', 'Invoice Number:') !!}
					{!! Form::text('invoice_number', null, ['class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('invoice_description', 'Invoice Description:') !!}
					{!! Form::text('invoice_description', null, ['class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('cost', 'Cost:') !!}
					{!! Form::number('cost', null, ['class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('currency', 'Currency:') !!}
					{!! Form::select('currency', $currencies,  null, ['id' => 'currency', 'class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('invoice_file', 'Upload the invoice:') !!}
					{!! Form::file('invoice_file', null, ['class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('date_recieved', 'Date Recieved:') !!}
					{!! Form::date('date_recieved', null, ['class' => 'form-control']) !!}
				</div>

				<div class="input_field">
					{!! Form::label('date_approved', 'Date Approved:') !!}
					{!! Form::date('date_approved', null, ['class' => 'form-control']) !!}
				</div>

				@include('categories._tagsByCategoryInput')


			</div>
			
			<div class="card-action">
				<div class="input_field">
					{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
				</div>
			</div>

		</div>

	</div>
	
</div>

@section('footer')

	@include("categories._tagsByCategoryScript")

@endsection