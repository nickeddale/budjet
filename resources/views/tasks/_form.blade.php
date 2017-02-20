<div class="card">
	<div class="card-stacked">

	<div class="card-content">
		

		<div class="form-group">
			{!! Form::label('owned_by', 'Who is responsible for this task?:') !!}
			{!! Form::select('owned_by', $users, null, ['id' => 'user', 'class' => 'form-control'] ); !!}
		</div>

		<div class="form-group">
			{!! Form::label('task_number', 'Task Number:') !!}
			{!! Form::text('task_number', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description', 'Description of this task') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
			
		<div class="form-group">
			{!! Form::label('cost', 'Project Cost:') !!}
			{!! Form::number('cost', null, ['class' => 'form-control']) !!}
		</div>
			

		<div class="form-group">
			{!! Form::label('invoice_id', 'Invoice:') !!}
			{!! Form::select('invoice_id', $invoices, null, [ 'id' => 'invoice_id', 'class' => 'form-control'] ) !!}
		</div>

		<div class="form-group">
			{!! Form::label('operating_month', 'What date did the work start?:') !!}
			{!! Form::date('operating_month', \Carbon\Carbon::now(), ['class' => 'form-control'] ); !!}
		</div>

		@include('categories._tagsByCategoryInput')

		</div>
	</div>

	<div class="card-action">

		<div class="form-group">
			{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
		</div>

	</div>

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