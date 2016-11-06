@extends('layouts.app')

@section('content')

	<h1>All Categories</h1>


	<table class="table table-condensed table-striped">

		<tr>

			<th>Category Name</th>
			<th>Created By</th>
			<th>Created On</th>
			<th>Last Updated By</th>
			<th>Last Updated On</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		
		</tr>


		@foreach ($categories->all() as $category)

			<tr>
			
				<td>{{ $category->name }} </td>
				<td>{{ $category->createdBy->name }} </td>
				<td>{{ $category->created_at }} </td>
				<td>{{ $category->lastUpdateBy->name }} </td>
				<td>{{ $category->updated_at }} </td>
				<td><a href="{{ route('categories.show', ['id' => $category->id]) }}">View Category</a> </td>
				<td><a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit Category</a> </td>
				<td>@include('categories/_delete')</td>

			</tr>

		@endforeach

	</table>

@stop