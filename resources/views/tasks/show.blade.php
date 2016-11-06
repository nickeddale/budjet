@extends('layouts.app')

@section('content')

	<h1>{{ $task->taskNumber }}</h1>

	{{ $task }}
	
@stop