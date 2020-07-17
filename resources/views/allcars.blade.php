@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
					@if(Session::has('success'))
					<div class="alert alert-success">
						<p>{{ session('success') }}</p>
					</div>
					@endif
					@if(Session::has('fail'))
					<div class="alert alert-danger">
						<p>{{ session('fail') }}</p>
					</div>
					@endif
				<div class="card-header">
					<h1>CARS</h1>
					<a style="float: right;" class="btn btn-primary" href="{{ url('cars/create') }}">+ add car</a>
				</div>
				<div class="card-body">	
		@if(count($cars))
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Image</th>
				<th>Make</th>
				<th>Model</th>
				<th>Produced On</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cars as $car)
			<tr>
				<td>{{ $car->id }}</td>
				<td><img class="img-thumbnail" style="max-height: 166px; min-height: 99px; min-width: 111px;" alt="no image" src="{{ Storage::url($car->avatar)}}"></td>
				<td>{{ $car->make }}</td>
				<td>{{ $car->model }}</td>
				<td>{{ $car->produced_on }}</td>
				<td><a class="btn btn-primary" href="{{ url('cars/'.$car->id.'/edit') }}">Edit</a></td>
				<td><form method="post" action="{{ url('cars/'.$car->id) }}">@csrf @method('DELETE') <button class="btn btn-danger">Delete</button></form></td>
			</tr>
			@endforeach
		</tbody>
	</table>
		@else

		<p>There are no car records... <a class="btn btn-link" href="{{ url('cars/create') }}">add car ?</a></p>
		@endif
				</div>

			{{$reviews ?? ''}}
				
			</div>
		</div>
	</div>
</div>
@endsection