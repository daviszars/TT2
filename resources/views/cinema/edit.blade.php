@extends('layouts.app')

@section('content')
    <h1>Edit</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\MovieController@update',$movie->id], 'files' => true, 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::select('type', ['movie' => 'Movie', 'tvshow' => 'TV-Show'], $movie->type, ['placeholder' => 'Choose a type'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$movie->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('genre','Genre')}}
            {{Form::text('genre',$movie->genre,['class'=>'form-control','placeholder'=>'Genre'])}}
        </div>
        <div class="form-group">
            {{Form::label('file_path','Poster image link')}}
            {{Form::text('file_path',$movie->file_path,['class'=>'form-control','placeholder'=>'Link to image'])}}
        </div>
        <div class="form-group">
            {{Form::date('release_date', $movie->release_date)}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection