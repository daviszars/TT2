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
                        <form action="" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                        <form action="" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="btn btn-danger">Unfollow</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else 
        <p>No movies to show :(</p>
    @endif
@endsection