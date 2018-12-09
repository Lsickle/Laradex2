@extends('layouts.app') 

@section('title', 'Trainers')

@section('content')
	<div class="row">
		@foreach($trainers as $trainer)
				<div class="col-sm">
					<div class="card text-center" style="width: 18rem; margin-top:3rem;">
						<img class="card-img-top rounded-circle mx-auto d-block" src="images/{{$trainer->avatar}}" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:8rem;height:8rem;">
						<div class="card-body">
							<h5 class="card-title">{{$trainer->name}}</h5>	
							<p class="card-text" style="overflow-y: scroll; max-height:3rem; min-height:3rem;">{{$trainer->description}}</p>
							<a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver mas...</a>
						</div>
					</div>
				</div>
		@endforeach
	</div>
@endsection