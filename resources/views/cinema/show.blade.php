@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-4">
            <h1>{{$movie->title}}</h1>
            <h5>{{__('messages.genre')}}: {{$movie->genre}}</h5>
            <h5>{{__('messages.release date')}}: {{$movie->release_date}}</h5>
          </div>
          <div class="col-8">
            <img src="/storage/poster_images/{{$movie->poster_image}}" alt="Cinema Poster" style="width:300px;height:450px;">
          </div>
        </div>
    </div>
    <hr>
    @auth
    @if (auth()->user()->is_admin)
    <a href="/cinema/{{$movie->id}}/edit" class="btn btn-primary">{{__('messages.edit')}}</a>
    {!! Form::open(['action' => ['App\Http\Controllers\MovieController@destroy',$movie->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit(trans('messages.delete'), ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
    @endauth
@endsection