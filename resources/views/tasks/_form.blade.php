<div class="form-group">
	{!! Form::label('task_number', 'Task Number:') !!}
	{!! Form::text('task_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('project_cost', 'Projected Cost:') !!}
	{!! Form::number('project_cost', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('actual_cost', 'Actual Cost:') !!}
	{!! Form::number('actual_cost', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('number_of_units', 'Number of Units:') !!}
	{!! Form::number('number_of_units', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('unit_cost', 'Unit Cost:') !!}
	{!! Form::number('unit_cost', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('unit', 'Unit:') !!}
	{!! Form::text('unit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('invoice_id', 'Invoice:') !!}
	{!! Form::select('invoice_id', $invoices, null, [ 'id' => 'invoice_id', 'class' => 'form-control'] ) !!}
</div>

<div class="form-group">
	{!! Form::label('booked_month', 'What date did the work start?:') !!}
	{!! Form::date('booked_month', \Carbon\Carbon::now(), ['class' => 'form-control'] ); !!}
</div>


@include('categories._tagsByCategoryInput')


<div class="form-group">
	{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
</div>
	

@section('footer')


	@include('categories._tagsByCategoryScript')
	
	<script>


		
		// removes default select from invoice dropdown
		$("#invoice_id").prop("selectedIndex", -1);
		$('#invoice_id').select2({
			placeholder: "Select an invoice",
			allowClear: true	
		});
		
	</script>

@endsection