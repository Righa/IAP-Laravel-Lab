<!DOCTYPE html>
<html>
<head>
	<title>New Car</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h1>Add Car;</h1></div>
				<div class="card-body">
					<form class="form" id="editcar" method="post" action="{{ url('car') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Make:</label>
							<input class="form-control" type="text" name="make">
						</div>
						<div class="form-group">
							<label>Model: </label>
							<input class="form-control" type="text" name="model">
						</div>
						<div class="form-group">
							<label>Produced on:</label>
							<input class="form-control" type="date" name="produced_on">
						</div>
						<div class="form-group">
							<a class="btn btn-secondary" href="{{ url('car') }}">Cancel</a>
							<button style="float: right;" type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>