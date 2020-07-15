<!DOCTYPE html>
<html>
<head>
	<title>All cars</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					<h1>CARS</h1>
				</div>
				<div class="card-body">	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
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
				<td>{{ $car->make }}</td>
				<td>{{ $car->model }}</td>
				<td>{{ $car->produced_on }}</td>
				<td><a class="btn btn-primary" href="{{ url('car/'.$car->id) }}">Edit</a></td>
				<td><form method="post" action="{{ url('car/'.$car->id) }}">@csrf<button class="btn btn-danger">Delete</button></form></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5"></td><td><a class="btn btn-primary" href="{{ url('newcar') }}">+ add car</a></td>
			</tr>
		</tbody>
	</table>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>