@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Categorías</h1>
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
    <form action="{{ route('categorias.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre de la categoría</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoria" required>
                </div>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre del aperitivo</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombrec" name="nombrec" placeholder="Ingrese el nombre del aperitivo" required>
                </div>
            </div>
    
            <div class="col">
                <label for="imagen" class="form-label">Imagen</label>
                <div class="input-group">            
                    <input type="file" id="imagen" name="imagen" class="form-control" placeholder="Amount" required>
                    {{-- <span class="input-group-text">.00</span> --}}
                </div>
            </div>
            <label for="descripcion" class="form-label">Descripción</label>
           <textarea name="descripcion" id="descripcion"  rows="3" class="form-control" required></textarea>

           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('categorias.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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