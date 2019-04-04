<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/additional-methods.min.js')}}"></script>
    <script src="{{asset('js/xlsx.full.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
    <title>{{config('app.name','MIT-AT')}}</title>

</head>

<body>

    <div id="wrapper">
        @guest
            <script>
                window.location.href = '{{route("login")}}';
            </script>
        @else
            @include('inc.sidebar') 
            <div id="page-wrapper">
                <div class="container-fluid">
                    @include('inc.messages')
                    @yield('content')  
                </div>
            </div>
        @endguest
    </div> 

</body>

</html>
