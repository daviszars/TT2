@extends('layouts.app')

@section('content')
    <h1>Cinema</h1>
    @if(count($movies) > 0)
        @foreach($movies as $movie)
        @if($movie->type == 'movie')
            <div class="card card-body bg-light">
                <h3><a href="/cinema/{{$movie->id}}">{{$movie->title}}</a></h3>
                <small>Release date {{$movie->release_date}}</small>
            </div>
        @endif
        @endforeach
    @else 
        <p>No movies to show :(</p>
    @endif
@endsection