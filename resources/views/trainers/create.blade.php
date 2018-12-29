@extends('layouts.app') 

@section('title', 'Trainers-Create')

@section('content')
	@include('common.errors')
	<form action="/trainers" class="form-group" method="POST" enctype="multipart/form-data">
		@include('trainers/form')
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection