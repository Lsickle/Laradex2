@extends('layouts.app') 

@section('title', 'Trainers')

@section('content')
	<div class="row">
		@foreach($trainers as $trainer)
				<div class="col-sm">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="images/{{$trainer->avatar}}" onerror="this.src='images/default.jpg';" alt="" style="width: 18rem;
height:18rem;">
						{{-- <img class="card-img-top" src=".../100px180" alt="Card image ap"> --}}
						<div class="card-body">
							<h5 class="card-title">{{$trainer->name}}</h5>
							<p class="card-text">Some quick example to build on the card title and make up the bulk of the card's content.</p>	
							<a href="#" class="btn btn-primary">Go Somewhere</a>
						</div>
					</div>
				</div>
		@endforeach
	</div>
@endsection