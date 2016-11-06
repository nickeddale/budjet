@extends('layouts.app')

@section('content')

	<h1>{{ $invoice->invoice_number }}</h1>

	{{ $invoice }}
	
@stop