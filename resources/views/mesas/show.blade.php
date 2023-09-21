@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
 
@stop

@section('content')
<h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles de la Mesa</h1>

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
        <section class="card card-green"  style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image">
                <img src={{ asset("/images/mesas/mesa.png") }} alt="OFF-white Green Edition" draggable="false" />
            </div>
            <div class="product-info">
                {{-- <h1>Categoría</h1> --}}
                <h2>Nombre: {{$mesas->nombre}}</h2>
                <h4>-- {{$mesas->estado}} --</h4>
                <p style="font-size: 15px">Ubicación: {{$mesas->locacion}}</p>
                <p style="font-size: 15px">Personas: {{$mesas->cantidad}}</p>
            </div>
            <div class="btn">
                <button class="buy-btn"># {{$mesas->id}}</button>
                <button class="fav">
                    <svg class="svg" id="i-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z" />
                    </svg>
                </button>
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