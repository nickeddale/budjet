@extends('layouts.app')

@section('content')

	
  <div class="col s12 m7">
    <h2 class="header">View Invoice</h2>
    <div class="card horizontal">
      <div class="card-image">
        @include('invoices._file-preview', $invoice)
      </div>
      <div class="card-stacked">
        <div class="card-content">
		    <ul class="collection">
  	      <li class="collection-item" >Invoice Number: {{ $invoice->invoice_number }}</li>
  				<li class="collection-item" >Description: {{ $invoice->invoice_description }}</li>
  				<li class="collection-item" >Cost: {{ $invoice->cost }}</li>
  				<li class="collection-item" >Currency: {{ $invoice->currency }}</li>
  				<li class="collection-item" >File: {{ $invoice->invoice_file }}</li>
  				<li class="collection-item" >Date Recieved: {{ $invoice->date_receieved }}</li>
  				<li class="collection-item" >Date Approved: {{ $invoice->date_approved }}</li>
  				<li class="collection-item" >Uploaded By: {{ $invoice->uploadedBy->name }}</li>
  				<li class="collection-item" >Last Updated By: {{ $invoice->lastUpdateBy->name }}</li>
  				<li class="collection-item" >Created On: {{ $invoice->created_at }}</li>
  			</ul>
        </div>
        <div class="card-action">
          <a href="{{ route('invoices.edit', ['id' => $invoice->id]) }}">Edit Invoice</a>
        </div>
      </div>
    </div>
  </div>


@stop