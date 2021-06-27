@extends('layouts.app')

@section('content')
    <h1>{{__('messages.create')}}</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\MovieController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::select('type', ['movie' => trans('messages.movies'), 'tvshow' => trans('messages.tvshows')], null, ['placeholder' => trans('messages.choose a type')])}}
        </div>
        <div class="form-group">
            {{Form::label('title',trans('messages.title'))}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>trans('messages.title')])}}
        </div>
        <div class="form-group">
            {{Form::label('genre',trans('messages.genre'))}}
            {{Form::text('genre','',['class'=>'form-control','placeholder'=>trans('messages.genre')])}}
        </div>
        <div class="form-group">
            {{Form::file('poster_image')}}
        </div>
        <div class="form-group">
            {{Form::date('release_date', \Carbon\Carbon::now())}}
        </div>
        {{Form::submit(trans('messages.submit'), ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection