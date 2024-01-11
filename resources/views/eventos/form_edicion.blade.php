@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Editar Eventos</h1>
    
@stop

@section('content')
<form action="{{url('/eventos/editar' , $events->codevento)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom_evento" class="form-label">Nombre evento</label>
            <input type="text" class="form-control" id="nom_evento" name="nom_evento" value="{{$events->nomevento}}">
        </div>
        
        <div class="mb-3">
            <?php
            $fechamin = date("Y-m-d")
            ?>
            <label for="fecha_evento"  class="form-label">Fecha Evento</label>
            <input type="date" class="form-control" min="<?= $fechamin; ?>" id="fecha_evento" name="fecha_evento" value="{{$events->fecha}}">
        </div>
        <div class="mb-3">
            <?php
            $horamin = date("H:i");
            ?>
            <label for="hora_evento" class="form-label">Hora Evento</label>
            <input type="time" class="form-control" min="<?= $horamin; ?>" id="hora_evento" name="hora_evento" value="{{$events->hora}}">
        </div>
       
        <div class="mb-3">
            <label for="lugar_evento" class="form-label">Lugar Evento</label>
            <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" value="{{$events->lugar}}">
        </div>
        <div class="grid grid-cols-1 mt-5 mx-7">
                    <img id="imagenSeleccionada" style="max-height: 300px;" src="/imagen/{{$events->imagen}}" >           
       </div>
        <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 ">Subir Imagen</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                            </div>
                        <input name="imagen" id="imagen" type='file' class="hidden" >
                        </label>
                    </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
  });
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Enlace a la hoja de estilo de Tailwind CSS en tu HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop