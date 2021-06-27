@extends('layouts.app')

@section('content')
    <h1>{{__('messages.tvshows')}}</h1>
    @if(count($movies) > 0)
        @foreach($movies as $movie)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-10">
                        <h3><a href="/cinema/{{$movie->id}}">{{$movie->title}}</a></h3>
                        <small>{{__('messages.release date')}} {{$movie->release_date}}</small>
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
                <span>{{ $movie->follows->count()}} {{Str::title(trans('messages.following'), $movie->follows->count())}}</span>
            </div>
        @endforeach
    @else 
        <p>{{__('messages.no tvshows')}}</p>
    @endif
@endsection