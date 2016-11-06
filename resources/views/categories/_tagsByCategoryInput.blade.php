@foreach ($tagCategories as $category)

		<div class="form-group">
			{!! Form::label('tag_list', $category->name. ' Tags:') !!}
			{!! Form::select('tag_list[]', 
				$category->tags->pluck('name', 'id'), 
				null, 
				['id' => 'tag_list_' . $category->id, 'class' => 'form-control', 'multiple', 'tag_list'] ) 
			!!}
		</div>

@endforeach