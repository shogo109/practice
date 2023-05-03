@extends('layouts.app')
@include('navbar')
@section('content')

@vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<p>このページは仮のトップページです。</p>
<a href="#" class="btn btn-primary">仮のボタンです</a>

@endsection