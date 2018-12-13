@extends('layouts.app') 

@section('title', 'Trainers-Create')

@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<ul >
					<li>{{$error}}</li>
				</ul>
			@endforeach
		</div>
	@endif
	<form action="/trainers" class="form-group" method="POST" enctype="multipart/form-data">
		@include('trainers/form')
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection