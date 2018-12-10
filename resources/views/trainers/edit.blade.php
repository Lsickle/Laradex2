@extends('layouts.app') 

@section('title', 'Trainer-Edit')

@section('content')
	<form action="/trainers/{{$trainer->slug}}" class="form-group" method="POST" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:12rem;height:12rem;">
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{$trainer->name}}">
		</div>
		<div class="form-group">
			<label for="">Descripcion</label>
			<input type="text" name="descripcion" class="form-control" maxlength="255" value="{{$trainer->description}}">
		</div>
		<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar">
		</div>
		<button type="submit" class="btn btn-primary">Atualizar</button>
	</form>
@endsection