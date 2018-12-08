@extends('layouts.app') 

@section('title', 'Trainers-Create')

@section('content')
	<form action="/trainers" class="form-group" method="POST">
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection