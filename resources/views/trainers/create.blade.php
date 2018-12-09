@extends('layouts.app') 

@section('title', 'Trainers-Create')

@section('content')
	<form action="/trainers" class="form-group" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Descripcion</label>
			<input type="text" name="avatar">
		</div>
		<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar">
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection