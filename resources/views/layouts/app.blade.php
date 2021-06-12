<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <title>{{config('app.name', 'TT2')}}</title>
    </head>
    <body>
        <div class="container">
            @include('inc.navbar')
            <br>
            <div class="container">
                @yield('content')
            </div>
        </div>
    </body>
</html>
