
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					<h1>Car: {{ $car->id }}</h1>
					<a class="btn btn-primary" href="{{ url('/') }}"><strong>&lt Back</strong></a>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col">
						<div class="form-group">
							<img alt="no image" class="img-thumbnail" style="min-height: 222px; min-width: 333px; width: 333px;" src="{{ Storage::url($car->avatar) }}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<strong>Make:</strong><p>{{ $car->make }}</p>
						</div>
						<div class="form-group">
							<strong>Model:</strong><p>{{ $car->model }}</p>
						</div>
						<div class="form-group">
							<strong>Produced on:</strong><p>{{ $car->produced_on }}</p>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="col">
						<div class="card">
							<div class="card-header"><strong>Reviews</strong></div>
							@foreach($reviews as $review)
							<div class="card-body">
								<div class="card"><div class="card-body"><strong>Anon:</strong><p>{{ $review->comment }}</p></div></div>
							</div>
							@endforeach
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
