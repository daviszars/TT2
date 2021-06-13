@extends('layouts.app')

@section('content')
    <h1>Cinema</h1>
    @if(count($cinemas) > 0)
        @foreach($cinemas as $cinema)
            <div class="card card-body bg-light">
                <h3><a href="/cinema/{{$cinema->id}}">{{$cinema->title}}</a></h3>
                <small>Release date {{$cinema->release_date}}</small>
            </div>
        @endforeach
    @else 
        <p>No movies to show :(</p>
    @endif
@endsection