@extends('adminlte::page')

@section('title', 'Inscritos')

@section('content_header')
    <h1>Listado de Juegos Inscritos</h1>
@stop


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Código</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Número de Celular</th>
                <th>Juego</th>

                {{-- Agrega otras columnas según sea necesario --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($juegosInscritos as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->id }}</td>
                    <td>
                        {{ $inscripcion->user->name}}
                    </td>
                    <td>{{ $inscripcion->codigo }}</td>
                    <td>{{ $inscripcion->carrera }}</td>
                    <td>{{ $inscripcion->semestre }}</td>
                    <td>{{ $inscripcion->numero_celular }}</td>
                    <td>
                     @if ($inscripcion->eve)
                       {{ $inscripcion->eve->nomevento }}
                     @endif
                    </td>
                    {{-- Agrega otras columnas según sea necesario --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
