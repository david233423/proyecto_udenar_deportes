@extends('adminlte::page')

@section('title', 'Inscripción Juego')

@section('content_header')
    <h1>Inscripción Juego</h1>
@stop

@section('content')
    @if(isset($event) && $event)
        <form action="{{ route('guardar_inscripcion', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data" id="inscripcionForm">
            @csrf
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $event->codigo) }}">
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <input type="text" class="form-control" id="carrera" name="carrera" value="{{ old('carrera', $event->carrera) }}">
            </div>
            <div class="mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="text" class="form-control" id="semestre" name="semestre" value="{{ old('semestre', $event->semestre) }}">
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">Número de Celular</label>
                <input type="text" class="form-control" id="numero_celular" name="numero_celular" value="{{ old('numero_celular', $event->numero_celular) }}">
            </div>
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    @else
        <p>Error: No se pudo encontrar el evento.</p>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            if ($('#inscripcionForm').length) {
                $('#inscripcionForm').submit(function (e) {
                    alert('Juego inscrito');
                });
            }
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop