@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
 
@stop

@section('content')
   <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Gestionar Productos</h1>


@can('categorias.create')
 <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Nuevo producto</a>
@endcan

  <!--Ejemplo tabla con DataTables-->
  <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="example" class="table table-striped table-bordered shadow-lg mt-4 " cellspacing="0" width="100%">
                    <thead class="bg-primary text-while">
                        <tr align="center">
                            <th align="center">#</th>
                            <th align="center">Fecha de caducidad</th>
                            <th align="center">Categoría</th>
                            <th align="center">Estado</th>
                            <th align="center">Nombre</th>
                            <th align="center">Precio</th>                               
                            <th align="center">Stock</th>
                            <th align="center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ( $productos as $producto )

                      <tr>
                        <td align="center">{{$producto->id}}</td>
                        <td align="center">{{$producto->fecha_caducidad}}</td>
                     <td align="center">{{ $producto->categoria }}</td>
                     <td align="center">{{ $producto->estado}}</td>
                     <td align="center">{{ $producto->nombre}}</td>
                     <td align="center">{{ $producto->precio}}</td>
                     <td align="center">{{ $producto->stock }}</td>
            
                         <td align="center">
                           <div class="btn-group">
                            @can('productos.edit')
                              <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-info" >
                                 <i class="fas fa-fw fa-pen"></i> 
                               </a>
                            @endcan

                            @can('productos.destroy')
                              <form action="{{route('productos.destroy', $producto->id)}}" method="POST" class="formulario-eliminar">
                                 @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               </form>
                            @endcan

                          </div>
                         </td>
                      </tr>
                            
                  @endforeach                   
                    </tbody>        
                   </table>                  
                </div>
            </div>
    </div>  
</div>    
 


@stop

@section('css')
<link rel="stylesheet" href="sweetalert2.min.css">

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet"> 



@stop

@section('js')

<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

@if (session('eliminar')== '¡Categoria eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'El producto ha sido eliminado con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Este producto se eliminará definitivamente",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#4d72de',
cancelButtonColor: '#d33',
confirmButtonText: '¡Sí, eliminar!',
cancelButtonText: 'Cancelar'
}).then((result) => {
if (result.isConfirmed) {
this.submit();
}
})

});

</script>

<script>
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 




@stop