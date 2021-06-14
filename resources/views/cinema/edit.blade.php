@extends('layouts.app')

@section('content')
    <h1>Edit cinema</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\CinemaController@update',$cinema->id], 'files' => true, 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::select('type', ['movie' => 'Movie', 'tvshow' => 'TV-Show'], $cinema->type, ['placeholder' => 'Choose a type'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$cinema->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('genre','Genre')}}
            {{Form::text('genre',$cinema->genre,['class'=>'form-control','placeholder'=>'Genre'])}}
        </div>
        <div class="form-group">
            {{Form::date('release_date', $cinema->release_date)}}
            {{-- {{Form::file('file_path')}} --}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection