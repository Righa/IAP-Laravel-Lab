@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <h1>CARS</h1>
                    <strong>review featured cars or click reviews to see reviews</strong>
                </div>
                <div class="card-body">

                    @if (session('success'))

                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>

                    @endif

                    @if ($errors->any())

                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>

                    @endif

                    @if(count($cars))
                    @foreach($cars as $car)

                    <div class="card" style="margin: 11px;">
                        <div class="card-body">
                            <div class="row display-block">
                                <div class="col">
                                    <img class="img-thumbnail" style="max-width: 333px; min-height: 99px; min-width: 111px;" alt="no image" src="{{ Storage::url($car->avatar)}}">
                                </div>
                                <div class="col">
                                    <h1>{{ $car->make }}</h1>
                                    <strong>Model; </strong><br>
                                    <label>{{ $car->model }}</label><br>
                                    <strong>Produced on;</strong><br>
                                    <label>{{ $car->produced_on }}</label><br><br>

                                    <a href="{{ url('onecar/'.$car->id) }}" class="btn btn-primary" type="submit">View</a>
                                </div>
                            </div><br>
                            <div class="card"  style="margin: 11px; min-height: 11px">
                                <button data-toggle="collapse" data-target="#reviews{{ $car->id }}" class="btn btn-sm btn-link">Reviews: {{ count($reviews[$car->id] ?? '') }}</button>
                                <div id="reviews{{ $car->id }}" style="max-height: 222px; overflow-y: scroll;" class="card-body collapse">

                                    @if(count($reviews[$car->id]))
                                    @foreach($reviews[$car->id] as $review)

                                    <div class="card" style="margin: 9px">
                                        <div class="card-body">
                                            <strong>Anon: </strong><p>{{ $review->comment }}</p>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            <form method="post" action="{{ url('review') }}" class="row">
                                @csrf
                                <div class="col-lg-10"><input class="form-control mr-sm-2" name="comment" type="text" placeholder="Write a review..."></div>
                                <div class="col">
                                    <input type="hidden" name="car" value="{{ $car->id }}">
                                    <button class="btn btn-block btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @endforeach
                    @else

                    <div class="card-body">
                        <p>There are no cars to review <a href="{{ route('login') }}">login</a> to add records</p>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
