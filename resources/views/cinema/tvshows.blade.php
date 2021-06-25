@extends('layouts.app')

@section('content')
    <h1>TV-Shows</h1>
    @if(count($movies) > 0)
        @foreach($movies as $movie)
            <div class="card card-body bg-light">
                <h3><a href="/cinema/{{$movie->id}}">{{$movie->title}}</a></h3>
                <small>Release date {{$movie->release_date}}</small>
            </div>
        @endforeach
    @else 
        <p>No tv-shows to show :(</p>
    @endif
@endsection