@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Reservaciones</h1>
@stop

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Prepend and Append Inputs</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4" >
    <form action="{{ route('reservaciones.update', $reservaciones->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">Nombres</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$reservaciones->nombre}}" required>
                </div>
            </div>

            <div class="col-6">
                <label for="apellido" class="form-label">Apellidos</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{$reservaciones->apellido}}" required>
                </div>
            </div>

            <div class="col-6">
                <label for="correo" class="form-label">Correo</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{$reservaciones->correo}}" required>
                </div>
            </div>

            <div class="col-6">
                <label for="numero" class="form-label">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{$reservaciones->telefono}}" required>
                </div>
            </div>

            <div class="col-6">
                <label for="fecha" class="form-label">Día de reservación</label>
                <div class="input-group">
        
                    <input type="datetime-local" class="form-control" id="fecha" name="fecha" value="{{$reservaciones->fecha}}" required>
                </div>
            </div>
    

            <div class="col-6">
                <label for="categoria" class="form-label">Mesa</label>
                <div class="input-group">
                  <select name="id_mesa" id="id_mesa" class="form-control" value="{{$reservaciones->id_mesa}}">
                    <option value="">Selecciona una mesa</option>
                    @foreach ( $mesas as $mesa )
                        <option value="{{$mesa->id}}">{{ $mesa->nombre }}</option>
                    @endforeach

                  </select>
                </div>
            </div>

            <div class="col">
                <label for="cantidad" class="form-label">Número de personas en la reserva</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{$reservaciones->cantidad}}" required>
                </div>
            </div>



           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('reservaciones.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
          </div>
    
        </div>

    </form>
</div>  
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 

@stop