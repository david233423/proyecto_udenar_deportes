

@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Udenar Deportes</h1>
    
@stop

@section('content')
<p>Este contenido es publico</p>

@role('admin')
<p>Solo lo va a ver el rol admin</p>
@endrole
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop