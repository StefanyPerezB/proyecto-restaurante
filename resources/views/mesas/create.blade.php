@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Mesa</h1>
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
    <form action="{{ route('mesas.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-2" >
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la mesa" required>
                </div>
            </div>

            <div class="col-6">
                <label for="cantidad" class="form-label">Número de personas</label>
                <div class="input-group">            
                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad de personas" required>
                    <span class="input-group-text">
                        <span class="bi-person"></span>
                    </span>
                </div>
            </div>


            <div class="col-6">
                <label for="estado" class="form-label">Estado</label>
                <div class="input-group">
                  <select name="estado" id="estado" class="form-control">
                    <option value="">Seleccione un estado</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Disponible">Disponible</option>
                    <option value="No disponible">No disponible</option>
                  </select>
                </div>
            </div>

            <div class="col-6">
                <label for="locacion" class="form-label">Ubicación</label>
                <div class="input-group">
                  <select name="locacion" id="locacion"  class="form-control">
                    <option value="">Seleccione una ubicación</option>
                     <option value="Entrada">Entrada</option>
                     <option value="Frente cocina">Frente cocina</option>
                     <option value="Salón">Salón</option>
                  </select>
                </div>
            </div>

            


           <div>
            <button type="submit" class="btn btn-primary" class="formulario-ingresar"><i class="fas fa-fw fa-check"></i>Registrar</button> 
            <a href="{{route ('mesas.index')}}" class="btn btn-success float-right"><i class="fas fa-fw fa-check"></i>Regresar</a>
          </div>
    
        </div>

    </form>
</div>  
</body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@stop