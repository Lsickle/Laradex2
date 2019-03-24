@extends('layouts.app') 

@section('title', 'Trainer')

@section('content')
	@include('common.success')
	<img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:12rem;height:12rem;">
	<div class="text-center">	
		<h5>{{$trainer->name}}</h5>

		<p>{{$trainer->description}}</p>

		<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
		<br><br>
		<form action="/trainers/{{$trainer->slug}}" class="form-group" method="POST">
			@csrf
			@method('DELETE')
				<button type="submit" class="btn btn-danger">Borrar</button>
		</form>
	</div>
	<create-form-pokemon></create-form-pokemon>
	<modal-button></modal-button>
@endsection