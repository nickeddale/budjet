@extends('layouts.app', ['vueView' => 'graph'])

@section('content')


	<h1>Reports</h1>

	<div class="col-md-4">
		<graph-child 
			url="/api/reportQuery/1"
		>	
		</graph-child>
	</div>





@endsection