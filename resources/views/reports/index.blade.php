@extends('layouts.app', ['vueView' => 'graph'])

@section('content')


	<h1>Reports</h1>

		<graph-child 
			url="/api/reportQuery/1"
		>	
		</graph-child>





@endsection