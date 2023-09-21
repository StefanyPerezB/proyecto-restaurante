@extends('adminlte::page')

@section('title', 'Menus')

@section('content_header')
 
@stop

@section('content')
 <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Detalles del Menú</h1> 


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

        <section class="card card-blue" style="margin-top: 12%; margin-bottom:12%">
            <div class="product-image">
                <img src={{ asset("/images/menus/chef.png") }} alt="OFF-white Red Edition" draggable="false" />
            </div>
            <div class="product-info">
                <h2>Nombre: {{$menus->nombre}}</h2>
                <p style="font-size: 15px">
                    @foreach ($categorias as $item)
                                @if ($menus->id_categoria==$item->id)
                                    Categoría: {{ $item->nombre }}
                                @endif
                    @endforeach
                </p>
                <p style="font-size: 15px">
                    @foreach ($categorias as $item)
                                @if ($menus->id_categoria==$item->id)
                                    Aperitivo: {{ $item->nombrec }}
                                @endif
                    @endforeach
                </p>
                <div class="price">S/. {{$menus->precio}}.00</div>
            </div>
            <div class="btn">
                <button class="buy-btn"># {{$menus->id}}</button>
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