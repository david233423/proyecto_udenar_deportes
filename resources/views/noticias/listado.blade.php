
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    {{ __('Dashboard') }}
@stop

@section('content')
<h1>Bienvenido a noticias</h1>
<h3>soy desarrollador</h3>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop