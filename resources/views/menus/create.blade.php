@extends('adminlte::page')

@section('title', 'Menú')

@section('content_header')
    <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Menú</h1>
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
    <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del menú" required>
                </div>
            </div>
    
            <div class="col-6">
                <label for="imagen" class="form-label">Imagen</label>
                <div class="input-group">            
                    <input type="file" id="imagen" name="imagen" class="form-control" placeholder="Amount" required>
                    {{-- <span class="input-group-text">.00</span> --}}
                </div>
            </div>

            <div class="col-6">
                <label for="categoria" class="form-label">Categoría</label>
                <div class="input-group">
                  <select name="id_categoria" id="id_categoria" class="form-control">
                    <option value="">Seleccionar categoría</option>
                    @foreach ( $categorias as $categoria )
                        <option value="{{$categoria->id}}">{{ $categoria->nombre }}</option>
                    @endforeach

                  </select>
                </div>
            </div>
            <div class="col-6">
                <label for="categoria" class="form-label">Aperitivo</label>
                <div class="input-group">
                  <select name="id_categoria" id="id_categoria" class="form-control">
                    <option value="">Seleccionar aperitivo</option>
                    @foreach ( $categorias as $categoria )
                        <option value="{{$categoria->id}}">{{ $categoria->nombrec }}</option>
                    @endforeach

                  </select>
                </div>
            </div>

            <div class="col">
                <label for="precio" class="form-label">Precio</label>
                <div class="input-group">            
                    <input type="text" id="precio" name="precio" min="0.00" max="10000.00" step="0.01" class="form-control" placeholder="S/.">
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <label for="descripcion" class="form-label">Descripción</label>
           <textarea name="descripcion" id="descripcion"  rows="3" class="form-control" required></textarea>

           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('menus.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
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