@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')


    <style> 

        .custom-title {
            font-size: 3em;
            font-weight: bold;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .rojo {
            color: #dc3545;
        }

        .verde {
            color: #28a745;
        }

        .amarillo {
            color: #ffc107;
        }

        .blanco {
            color: #ffffff;
        }

        .container {
            margin-bottom: 50px;
        }

        .carrosel {
            -webkit-perspective: 250px;
            -moz-perspective: 250px;
            width: 400px;
            height: 200px;
            top: 50px;
            position: relative;
            margin: 0 auto;
        }
        
        @-webkit-keyframes efeitoCarrosel {
            from {
                -webkit-transform: rotateY(360deg) translateZ(130px) rotateY(-360deg);
                -moz-transform: rotateY(360deg) translateZ(130px) rotateY(-360deg);
                z-index: 10;
                opacity: 1
            }

            50% {
                z-index: -10;
            }

            to {
                -webkit-transform: rotateY(0deg) translateZ(130px) rotateY(0deg);
                -moz-transform: rotateY(0deg) translateZ(130px) rotateY(0deg);
                z-index: 10;
                opacity: 1
            }
        }

        @-moz-keyframes efeitoCarrosel {
            from {
                -moz-transform: rotateY(360deg) translateZ(130px) rotateY(-360deg);
                z-index: 10;
                opacity: 1
            }

            50% {
                z-index: -10;
            }

            to {
                -moz-transform: rotateY(0deg) translateZ(130px) rotateY(0deg);
                z-index: 10;
                opacity: 1
            }
        }

        .caixa__card {
            width: 200px;
            height: 200px;
            background-color: #442222;
            position: absolute;
            display: flex;
            font-weight: bold;
            justify-content: center;
            align-items: center;
            top: 35px;
            left: 125px;
            font-size: 9px;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, .5);
            text-align: center;
            -webkit-animation-name: efeitoCarrosel;
            -moz-animation-name: efeitoCarrosel;
            -webkit-animation-duration: 8s;
            -moz-animation-duration: 8s;
            -webkit-animation-iteration-count: infinite;
            -moz-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-timing-function: linear;
        }

        .caixa__card:hover {
            border: solid #4466cc 3px;
            box-shadow: 0px 0px 10px #4466cc;
        }

        .caixa__card.cc__1 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -7s;
            -moz-animation-delay: -7s;
        }

        .caixa__card.cc__2 {

            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -6s;
            -moz-animation-delay: -6s;
        }

        .caixa__card.cc__3 {

            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -5s;
            -moz-animation-delay: -5s;
        }

        .caixa__card.cc__4 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -4s;
            -moz-animation-delay: -4s;
        }

        .caixa__card.cc__5 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -3s;
            -moz-animation-delay: -3s;
        }

        .caixa__card.cc__6 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -2s;
            -moz-animation-delay: -2s;
        }

        .caixa__card.cc__7 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
            -webkit-animation-delay: -1s;
            -moz-animation-delay: -1s;
        }

        .caixa__card.cc__8 {
            background: linear-gradient(#d8d8d8, #e0d899, #e59595, #a5ffa5);
        }

        .tarjetas {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .tarjeta {
            width: 200px;
            height: 150px;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .tarjeta p {
            margin-bottom: 10px;
        }

        .amarillo-pastel {
            background-color: #ffe066;
        }

        .rojo-pastel {
            background-color: #ff9999;
        }

        .verde-pastel {
            background-color: #99ff99;
        }

        .blanco-pastel {
            background-color: #f0f0f0;
        }

        .tarjeta i {
            font-size: 2em;
            color: #333; /* Puedes ajustar el color del ícono según tus preferencias */
        }
    </style>

    <div class="container">
        <h1 class="custom-title">
            <span class="rojo">U</span>
            <span class="verde">D</span>
            <span class="amarillo">E</span>
            <span class="verde">N</span>
            <span class="rojo">A</span>
            <span class="verde">R</span>
            <br>
            <span class="amarillo"> </span>
            <span class="rojo">D</span>
            <span class="verde">E</span>
            <span class="amarillo">P</span>
            <span class="verde">O</span>
            <span class="rojo">R</span>
            <span class="verde">T</span>
            <span class="amarillo">E</span>
            <span class="rojo">S</span>
        </h1>
    </div>

    <div class="conteudo">
        <div class="carrosel">
            <div class="caixa__card cc__1"> <img src="{{ asset('imagen/futbol.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__2"> <img src="{{ asset('imagen/basket.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__3"> <img src="{{ asset('imagen/pong.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__4"> <img src="{{ asset('imagen/atletismo.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__5"> <img src="{{ asset('imagen/anime.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__6"> <img src="{{ asset('imagen/10.jpg') }}" width="180px" height="180"></div>
            <div class="caixa__card cc__7"> <img src="{{ asset('imagen/11.jpg') }}" width="180px" height="180"></div>
        </div>
    </div>

    <div class="container">
        <h1 class="custom-title">
            <!-- Tu título actual... -->
        </h1>
    </div>

    <div class="conteudo">
        <div class="carrosel">
            <!-- Tu carrusel actual... -->
        </div>

        <div class="tarjetas">
            <div class="tarjeta amarillo-pastel">
                <p style="text-align: center;">"Encuentra la fuerza en tu interior y lleva tu rendimiento a nuevas alturas." </p>
                <i class="fas fa-running"></i>
            </div>
            <div class="tarjeta rojo-pastel">
                <p style="text-align: center;">Crece como atleta, nutre tu cuerpo y alma, y florece en la competencia</p>
                <i class="fas fa-dumbbell"></i>
            </div>
            <div class="tarjeta verde-pastel">
                <p style="text-align: center;"> Deja que la disciplina guíe tu camino hacia el éxito.</p>
                <i class="fas fa-bicycle"></i>
            </div>
            <div class="tarjeta blanco-pastel">
                <p style="text-align: center;">Desafía tus límites, conquista tus metas, y celebra cada logro en tu viaje deportivo.</p>
                <i class="fas fa-swimmer"></i>
            </div>
        </div>
    </div>
        
@stop

@role('admin')
<p>ADMIN</p>
@endrole

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
