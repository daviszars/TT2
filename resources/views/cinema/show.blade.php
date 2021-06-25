@extends('layouts.app')

@section('content')
    <h1>{{$movie->title}}</h1>
    <hr>
    <a href="/cinema/{{$movie->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\MovieController@destroy',$movie->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection