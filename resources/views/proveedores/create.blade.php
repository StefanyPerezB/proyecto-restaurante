@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Proveedores</h1>
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
    <form action="{{ route('proveedores.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">RUC</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Ingrese el RUC" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre y Apellidos del proveedor</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proveedor" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">DNI</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Correo electrónico</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el DNI" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el número de teléfono" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Dirección</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección" required>
                </div>
            </div>
   
           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('proveedores.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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