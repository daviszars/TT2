@extends('layouts.app')

@section('content')
    <h1>Cinema</h1>
    @if(count($movies) > 0)
        @foreach($movies as $movie)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3><a href="/cinema/{{$movie->id}}">{{$movie->title}}</a></h3>
                        <small>Release date {{$movie->release_date}}</small>
                    </div>
                    <div class="col-2">
                        @auth
                        @if(!$movie->followedBy(auth()->user()))
                        <form action="{{route('movies.follows', $movie->id)}}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                        @else
                        <form action="{{route('movies.follows', $movie->id)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Unfollow</button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
                <span>{{ $movie->follows->count()}} {{Str::plural('follower', $movie->follows->count())}}</span>
            </div>
        @endforeach
    @else 
        <p>No movies to show :(</p>
    @endif
@endsection