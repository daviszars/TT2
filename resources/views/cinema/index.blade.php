@extends('layouts.app')

@section('content')
    <h1>{{__('messages.schedule')}}</h1>
    @guest
        <div class="jumbotron text-center">
            <p>
                <h1>{{__('messages.login to view')}}</h1>
                <br>
                <a class="btn btn-primary btn-lg" href="/login" role="button">{{__('messages.login')}}</a> 
                <a class="btn btn-success btn-lg" href="/register" role="button">{{__('messages.register')}}</a>
            </p>
        </div>
    @endguest
    @auth
    @foreach($movies as $movie)
        @if($movie->followedBy(auth()->user()))
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3><a href="/cinema/{{$movie->id}}">{{$movie->title}}</a></h3>
                        <h5>{{__('messages.release date')}} {{$movie->release_date}}</h5>
                    </div>
                    <div class="col-2">
                        @auth
                        @if(!$movie->followedBy(auth()->user()))
                        <form action="{{route('movies.follows', $movie->id)}}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="btn btn-primary">{{__('messages.follow')}}</button>
                        </form>
                        @else
                        <form action="{{route('movies.follows', $movie->id)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{__('messages.unfollow')}}</button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @endauth
@endsection