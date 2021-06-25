@extends('layouts.app')

@section('content')
    <h1>Your schedule</h1>
    @guest
        <div class="jumbotron text-center">
            <p>
                <h1>Login to view</h1>
                <br>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> 
                <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
            </p>
        </div>
    @endguest
@endsection