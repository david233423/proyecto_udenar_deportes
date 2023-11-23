
@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos Udenar</h1>
    
@stop

@section('content')
<div class="container">
        <a href="{{route('form_registro_eve')}}" class="btn btn-primary">Adicionar</a>
</div>

@foreach($events as $e)
        <div class="card" style="width: 18rem;">
        <img src="/imagen/{{$e->imagen}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$e->nomevento}}</h5>
            <p class="card-text">{{$e->codevento}}</p>
            <p class="card-text">{{$e->fecha}}</p>
            <p class="card-text">{{$e->hora}}</p>
            <p class="card-text">{{$e->lugar}}</p>
            <a href="{{route('editar_eve', $e->codevento)}}" class="btn btn-primary">Editar</a>
            <a href="{{route('eliminar_eve', $e->codevento)}}" class="btn btn-danger">Borrar</a>
        </div>
        </div>
@endforeach

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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
   
@section('js')
    <script> console.log('Hi!'); </script>
@stop