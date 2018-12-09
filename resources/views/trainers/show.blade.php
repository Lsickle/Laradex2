@extends('layouts.app') 

@section('title', 'Trainer')

@section('content')
	<img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:12rem;height:12rem;">
	<div class="text-center">	
		<h5>{{$trainer->name}}</h5>
		<p>{{$trainer->description}}</p>
	</div>
@endsection