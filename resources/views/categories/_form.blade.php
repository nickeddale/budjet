<div class="form-group">
	{!! Form::label('name', 'Category Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::submit($submitButonText, ['class' => 'form-control']); !!}
</div>
	