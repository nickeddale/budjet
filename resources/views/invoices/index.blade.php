@extends('layouts.app')

@section('content')

	<h1>All Invoices</h1>


	<table class="table table-condensed table-striped">

		<tr>

			<th>Invoice Number</th>
			<th>Invoice Description</th>
			<th>Cost</th>
			<th>Currency</th>
			<th>File</th>
			<th>Tags</th>
			<th>Date Recieved</th>
			<th>Date Approved</th>
			<th>Uploaded By</th>
			<th>Created On:</th>
			<th>Last Updated By</th>
			<th>Updated On:</th>
			<th>View Invoice</th>
			<th>Edit Invoice</th>
			<th>Delete Invoice</th>
		
		</tr>


		@foreach ($invoices->all() as $invoice)

			<tr>
				<td>{{ $invoice->invoice_number}}</td>
				<td>{{ $invoice->invoice_description}}</td>
				<td>{{ $invoice->cost}}</td>
				<td>{{ $invoice->currency}}</td>
				<td> 
					<a href="{{ route('invoices.download', ['id' => $invoice->id] ) }}">Download File</a> 
				</td>
				<td>
					@include('tags._label', $tags = $invoice->tags)
				</td>
				<td>{{ $invoice->date_recieved}}</td>
				<td>{{ $invoice->date_approved}}</td>
				<td>{{ $invoice->uploadedBy->name}}</td>
				<td>{{ $invoice->created_at}}</td>
				<td>{{ $invoice->lastUpdateBy->name}}</td>
				<td>{{ $invoice->updated_at}}</td>
				<td><a href="{{ route('invoices.show', ['id' => $invoice->id]) }}">View Invoice</a> </td>
				<td>
					<a href="{{ route('invoices.edit', ['id' => $invoice->id]) }}"
						class="btn-floating btn-small  amber accent-4">
						<i class="large material-icons">mode_edit</i>
					</a>
				</td>
				<td>  @include('invoices/_delete') </td>


			</tr>

		@endforeach

	</table>

@stop