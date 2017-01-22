@extends('layouts.app')

@section('content')

	<h1>All Tasks</h1>

	<div id="toolbar">
	  <select class="form-control">
	    <option value="">Export Basic</option>
	    <option value="all">Export All</option>
	    <option value="selected">Export Selected</option>
	  </select>
	</div>

	<table id="table" class="table table-condensed table-striped"
{{-- 
	   data-toggle="table"
       data-toolbar="#toolbar"
       data-show-export="true" --}}

		data-toggle="table"
		data-search="true"
		data-filter-control="true" 
		data-show-export="true"
		data-toolbar="#toolbar"

		data-show-columns="true"
		data-minimum-count-columns="2"
		data-show-pagination-switch="true"
		data-pagination="true"
		data-page-list="[10, 25, 50, 100, ALL]"
		data-show-footer="false"
 	>
		<thead>
			<tr>

				<th data-field="task_number" data-filter-control="input" data-sortable="true" >Task Number</th>
				<th data-field="task_description" data-filter-control="input" data-sortable="true" >Task Description</th>
				<th data-field="cost" data-filter-control="input" data-sortable="true" >Cost</th>
				<th data-field="invoice" data-filter-control="input" data-sortable="true" >Invoice</th>
				<th data-field="tags" data-filter-control="input" data-sortable="true" >Tags</th>
				<th data-field="operating_month" data-filter-control="input" data-sortable="true" >Operating Month</th>
				<th data-field="booked_month" data-filter-control="input" data-sortable="true" >Booked Month</th>
				<th data-field="createdBy" data-filter-control="input" data-sortable="true" >Created By</th>
				<th data-field="created_at" data-filter-control="input" data-sortable="true" >Created On</th>
				<th data-field="updatedBy" data-filter-control="input" data-sortable="true" >Last Updated By</th>
				<th data-field="updated_at" data-filter-control="input" data-sortable="true" >Last Updated On</th>
				<th data-field="view" data-filter-control="input" data-sortable="true" >View</th>
				<th data-field="edit" data-filter-control="input" data-sortable="true" >Edit</th>
				<th data-field="delete" data-filter-control="input" data-sortable="true" >Delete</th>
			
			</tr>
		</thead>

		@foreach ($tasks->all() as $task)

			<tr>
			
				<td>{{ $task->task_number }} </td>
				<td>{{ $task->description }} </td>
				<td>{{ $task->cost }} </td>
				<td>
					@unless( is_null($task->invoices))
						<a href="{{ route('invoices.show', ['id' => $task->invoice_id ]) }}">
						{{$task->invoices->invoice_number}}
						</a> 
					@else
						No invoice found
					@endunless
				</td>
				<td>
					@include('tags._label', $tags = $task->tags)
				</td>
				<td>{{ $task->operating_month }} </td>
				<td>{{ $task->booked_month }} </td>
				<td>{{ $task->createdBy->name }} </td>
				<td>{{ $task->created_at }} </td>
				<td>{{ $task->lastUpdateBy->name }} </td>
				<td>{{ $task->updated_at }} </td>
				<td><a href="{{ route('tasks.show', ['id' => $task->id]) }}">View Task</a> </td>
				<td><a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a> </td>
				<td>@include('tasks/_delete')</td>

			</tr>

		@endforeach

	</table>

@endsection

@section('footer')


<script>

$(function () {
	var $table = $('#table');
	$('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val()
    });
  });
});

</script>

@stop