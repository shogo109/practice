<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name', 'Laravelgram') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--bootstrap-->
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ secure_asset('css/application.css') }}" rel="stylesheet">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])


  </head>

  <body>
    @yield('navbar')

    <div class="container">
         @yield('content')
    </div>

    @yield('footer')

  </body>
</html>
