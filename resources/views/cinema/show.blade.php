@extends('layouts.app')

@section('content')
    <h1>{{$cinema->title}}</h1>
    <hr>
    <a href="/cinema/{{$cinema->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\CinemaController@destroy',$cinema->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection