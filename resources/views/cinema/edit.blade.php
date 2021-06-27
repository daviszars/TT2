@extends('layouts.app')

@section('content')
    <h1>{{__('messages.edit')}}</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\MovieController@update',$movie->id], 'files' => true, 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::select('type', ['movie' => trans('messages.movies'), 'tvshow' => trans('messages.tvshows')], $movie->type, ['placeholder' => trans('messages.choose a type')])}}
        </div>
        <div class="form-group">
            {{Form::label('title',trans('messages.title'))}}
            {{Form::text('title',$movie->title,['class'=>'form-control','placeholder'=>trans('messages.title')])}}
        </div>
        <div class="form-group">
            {{Form::label('genre',trans('messages.genre'))}}
            {{Form::text('genre',$movie->genre,['class'=>'form-control','placeholder'=>trans('messages.genre')])}}
        </div>
        <div class="form-group">
            {{Form::label('file_path',trans('messages.poster image link'))}}
            {{Form::text('file_path',$movie->file_path,['class'=>'form-control','placeholder'=>trans('messages.link to image')])}}
        </div>
        <div class="form-group">
            {{Form::date('release_date', $movie->release_date)}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit(trans('messages.submit'), ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection