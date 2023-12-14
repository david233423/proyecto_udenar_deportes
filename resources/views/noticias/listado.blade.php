@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1 id="header1">Noticias Udenar</h1>
@stop

@section('content')
@role('admin')
<div class="container" id="boton">
    <a href="{{ route('form_registro_not') }}" class="btn btn-success">Agregar Noticia</a>
</div>
@endrole
<br>
@foreach($noticias as $noticia)
    <div class="card mb-3" style="max-width: 1300px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/imagen/{{ $noticia->imagen }}" class="img-fluid rounded-start" alt="{{ $noticia->titulo }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $noticia->titulo }} </h2>
                    <br><br>
                    <p class="card-text">{{ $noticia->descripcion }}</p>
                    @role('admin')
                    <a href="{{ route('editar_not', $noticia->codigo) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('eliminar_not', $noticia->codigo) }}" class="btn btn-danger" onclick="eliminarNoticia(event, '{{ route('eliminar_not', $noticia->codigo) }}')"><i class="fas fa-trash"></i></a>
                    @endrole
                    <a href="{{ route('listado_eventos') }}" class="btn btn-success">Ver mas Informacion</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function eliminarNoticia(event, url) {
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
