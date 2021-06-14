@extends('layouts.app')

@section('content')
    <h1>Add cinema</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\CinemaController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::select('type', ['movie' => 'Movie', 'tvshow' => 'TV-Show'], null, ['placeholder' => 'Choose a type'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('genre','Genre')}}
            {{Form::text('genre','',['class'=>'form-control','placeholder'=>'Genre'])}}
        </div>
        <div class="form-group">
            {{Form::date('release_date', \Carbon\Carbon::now())}}
            {{-- {{Form::file('file_path')}} --}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection