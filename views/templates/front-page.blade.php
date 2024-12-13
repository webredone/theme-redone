@extends('layout.layout')

@section('content')
	@include('components.todo-remove-examples')
	{!! the_content() !!}
@stop