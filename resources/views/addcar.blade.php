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
                <div class="card-header"><h1>Add Car;</h1></div>
				<div class="card-body">
					@if($errors->any())
						<div class="toast-header"></div>
						<div class="alert toast-body alert-danger">
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif

					@if(Session::has('file_error'))
					<li>{{ session('file_error') }}</li>
					@endif
					<form class="form" id="editcar" method="post" action="{{ url('cars') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Car Image:</label><br>
							<img id="car-img-btn" onclick="transferClick()" alt="click to add image" class="img-thumbnail" style="min-height: 222px; min-width: 222px; max-width: 444px" src="">
							<input id="img-in" onchange="displayImg(this)" style="display: none;" type="file" name="avatar">
						</div>
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
							<a class="btn btn-secondary" href="{{ url('cars') }}">Cancel</a>
							<button style="float: right;" type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection