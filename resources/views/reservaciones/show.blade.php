@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
 
@stop

@section('content')
<h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles de la Reservación</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset("/show.css") }}>
</head>
<body>
    <main class="container">
        <section class="card card-white"  style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image">
                <img src={{ asset("/images/reservacion/reserva.png") }} alt="OFF-white Green Edition" draggable="false" />
            </div>
            <div class="product-info">
                <p style=" color:#3a3a3a; font-size: 20px">
                        @foreach ($mesas as $item)
                                    @if ($reservaciones->id_mesa==$item->id)
                                        {{ $item->nombre }}
                                    @endif
                        @endforeach
                    
                </p>
                <p style="color: #3a3a3a; font-size: 15px">Fecha y hora: {{$reservaciones->fecha}}</p>
                 <p style="color: #3a3a3a; font-size: 15px">Nombres y Apellidos: {{$reservaciones->nombre}} {{$reservaciones->apellido}}</p>
                 <p style="color: #3a3a3a; font-size: 15px">Correo: {{$reservaciones->correo}}</p>
                 <p style="color: #3a3a3a; font-size: 15px">Teléfono: {{$reservaciones->telefono}}</p>
                <p style="color: #3a3a3a; font-size: 15px">Personas: {{$reservaciones->cantidad}}</p>
            </div>

        </section>        
       
    </main>
   
</body>
</html>
@stop

@section('css')

@stop

@section('js')

@stop