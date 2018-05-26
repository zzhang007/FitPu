<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <style>     body{ color: #202020; }      </style> -->



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <style>     body{ font-family: serif; line-height: 2; color: #202020; }      </style> -->


</head>
<body>

<div id="app" class="containe-fluid">
    
    @include('layouts.header')

    <div class="container" style="min-height: 400px;">
        <div class="container-fluid" style="margin: 1% ;padding: 1% 2%;background-color: white;">
                @yield('content')
        </div>

        <div class="container-fluid" style="margin: 1% ; padding: 1% 2%;">
                @yield('content_more')
        </div> 
    </div>


    @include('layouts.footer')
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
