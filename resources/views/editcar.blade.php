
<script type="text/javascript">
	function transferClick() {
        document.querySelector('#img-in').click();
    }
    function displayImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#car-img-btn').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h1>Car: {{ $car->id }}</h1></div>
				<div class="card-body">
					@if($errors->any())
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif
					<form class="form" id="editcar" method="post" action="{{ url('cars/'.$car->id) }}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label>Car Image:</label><br>
							<img id="car-img-btn" onclick="transferClick()" alt="click to add image" class="img-thumbnail" style="min-height: 222px; min-width: 333px; width: 333px;" src="{{ Storage::url($car->avatar) }}">
							<input id="img-in" onchange="displayImg(this)" style="display: none;" type="file" name="avatar">
						</div>
						<div class="form-group">
							<label>Make:</label>
							<input class="form-control" type="text" value="{{ $car->make }}" name="make">
						</div>
						<div class="form-group">
							<label>Model: </label>
							<input class="form-control" type="text" value="{{ $car->model }}" name="model">
						</div>
						<div class="form-group">
							<label>Produced on:</label>
							<input class="form-control" type="date" value="{{ $car->produced_on }}" name="produced_on">
						</div>
						<div class="form-group">
							<a class="btn btn-secondary" href="{{ url('cars') }}">Cancel</a>
							<button style="float: right;" type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
