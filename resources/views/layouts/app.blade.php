<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name', 'Laravelgram') }}</title>
    <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" sizes="180x180">
    <link rel="manifest" href="{{ asset('build/manifest.webmanifest') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--bootstrap-->
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/application.css') }}" rel="stylesheet"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

   
  </head>

  <body>
    @yield('navbar')

    <div class="my-container">
         @yield('content')
    </div>

    @yield('footer')

    <!-- <div class="overlay" id="js-overlay"></div>

    <button class="add-button">ホーム画面に追加</button> -->
    
    <script src="/registerSW.js"></script>
    @yield('scripts')
  </body>
</html>
