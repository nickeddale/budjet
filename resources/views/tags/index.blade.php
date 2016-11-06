@extends('layouts.app')

@section('content')

	<h1>All Invoices</h1>


	<table class="table table-condensed table-striped">

		<tr>

			<th>Tag Id</th>
			<th>Tag Name</th>
			<th>Tag Category</th>
			<th>Created On:</th>
			<th>Updated On:</th>
			<th>View Tag</th>
			<th>Edit Tag</th>
			<th>Delete Tag</th>
		
		</tr>


		@foreach ($tags->all() as $tag)

			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>{{ $tag->categories->name }}</td>
				<td>{{ $tag->created_at }}</td>
				<td>{{ $tag->updated_at }}</td>
				<td><a href="{{ route('tags.show', ['id' => $tag->id]) }}">View tag</a> </td>
				<td><a href="{{ route('tags.edit', ['id' => $tag->id]) }}">Edit tag</a> </td>
				<td>  @include('tags/_delete') </td>


			</tr>

		@endforeach

	</table>

@stop