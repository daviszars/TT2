@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-4">
            <h1>{{$movie->title}}</h1>
            <h5>Genre: {{$movie->genre}}</h5>
            <h5>Release date: {{$movie->release_date}}</h5>
          </div>
          <div class="col-8">
            <img src={{$movie->file_path}} alt="Cinema Poster" style="width:300px;height:450px;">
          </div>
        </div>
    </div>
    <hr>
    <a href="/cinema/{{$movie->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\MovieController@destroy',$movie->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection