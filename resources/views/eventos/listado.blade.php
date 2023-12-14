
@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1 id="header1">Eventos Udenar</h1>
    
@stop

@section('content')
@role('admin')
<div class="container" id="boton" >
        <a href="{{route('form_registro_eve')}}" class="btn btn-success">Agregar Juego</a>
</div>
@endrole
<br>
@foreach($events as $e)
        <div class="card mb-3" style="max-width: 1300px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/imagen/{{$e->imagen}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $e->nomevento }} Organizador: {{ $e->user->name }}</h5>
                        <p class="card-text">{{$e->codevento}}</p>
                        <p class="card-text">{{$e->fecha}}</p>
                        <p class="card-text">{{$e->hora}}</p>
                        <p class="card-text">{{$e->lugar}}</p>
                        @role('admin')
                        <a href="{{route('editar_eve', $e->codevento)}}" class="btn btn-primary"> <i class="fas fa-edit"></i></a>
                        <a href="{{route('eliminar_eve', $e->codevento)}}" class="btn btn-danger" onclick="eliminarEvento(event, '{{route('eliminar_eve', $e->codevento)}}')"><i class="fas fa-trash"></i></a>
                        @endrole
                        <a href="{{route('editar_eve', $e->codevento)}}" class="btn btn-success"> Incribirme</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach

<div class="d-flex justify-content-center">
    {{ $events->links('pagination::bootstrap-4') }}
</div>

<script>
    function eliminarEvento(event, url) {
        event.preventDefault();

        Swal.fire({
            title: '¿Confirma la eliminación del registro?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
                Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
            }
        });
    }
</script>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop
   
@section('js')
    <script> console.log('Hi!'); </script>
    <!-- Ejemplo usando CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@stop