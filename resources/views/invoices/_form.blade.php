<div class="form-group">
	{!! Form::label('invoice_number', 'Invoice Number:') !!}
	{!! Form::text('invoice_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('invoice_description', 'Invoice Description:') !!}
	{!! Form::text('invoice_description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cost', 'Cost:') !!}
	{!! Form::number('cost', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('currency', 'Currency:') !!}
	{!! Form::select('currency', $currencies,  null, ['id' => 'currency', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('invoice_file', 'Upload the invoice:') !!}
	{!! Form::file('invoice_file', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('date_recieved', 'Date Recieved:') !!}
	{!! Form::date('date_recieved', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('date_approved', 'Date Approved:') !!}
	{!! Form::date('date_approved', null, ['class' => 'form-control']) !!}
</div>

@include('categories._tagsByCategoryInput')

<div class="form-group">
	{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
</div>
	

@section('footer')

	@include("categories._tagsByCategoryScript")

@endsection