@foreach ($tags as $tag)
	<span class="label label-info">{{ $tag->name }} : {{ $tag->categories->name }}</span>
@endforeach
