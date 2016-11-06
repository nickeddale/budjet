<div class="form-group">
	{!! Form::label('name', 'Tag Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Category:') !!}
	{!! Form::select('category_id', $categories, null, [ 'id' => 'category_id', 'class' => 'form-control'] ) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
</div>
	

@section('footer')

	<script>
		$('#category_id').select2();
	</script>
@endsection