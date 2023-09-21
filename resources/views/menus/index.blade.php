@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
 
@stop

@section('content')
   <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Menú</h1>

@can('menus.create')
 <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Nuevo menú</a>
@endcan

  <!--Ejemplo tabla con DataTables-->
  <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="example" class="table table-striped table-bordered shadow-lg mt-4" cellspacing="0" width="100%">
                    <thead class="bg-primary text-while">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>  
                            <th>Descripción</th>                             
                            <th>Categoría</th>  
                            <th>Aperitivo de acompañamiento</th> 
                            <th>Imagen</th>                         
                            <th>Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                      @foreach ( $menus as $menu )

                      <tr>
                        <td align="center">{{$menu->id}}</td>
                     <td align="center">{{ $menu->nombre }}</td>
                     <td align="center">
                       S/. {{ $menu->precio }}.00
                     </td>
                     <td align="center">{{ $menu->descripcion }}</td>
                     <td align="center">
                      @foreach ($categorias as $item)
                      @if ($menu->id_categoria == $item->id)
                          {{ $item->nombre}}
                      @endif
                      @endforeach
                     </td>
                     <td align="center">
                      @foreach ($categorias as $item)
                      @if ($menu->id_categoria == $item->id)
                          {{ $item->nombrec}}
                      @endif
                      @endforeach
                     </td> 
                     <td align="center">
                      <img src="{{$menu->imagen}}" alt="{{$menu->nombre}}" class="img-fluid" width="120px">
                     </td>
            
                         <td align="center">
                           <div class="btn-group">
                            @can('menus.edit')
                              <a href="{{route('menus.edit', $menu->id)}}" class="btn btn-info">
                                 <i class="fas fa-fw fa-pen"></i> 
                               </a>
                            @endcan

                            @can('menus.destroy')
                              <form action="{{route('menus.destroy', $menu->id)}}" method="POST" class="formulario-eliminar">
                                 @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               </form>
                            @endcan

                            @can('menus.show')
                            <a href="{{route('menus.show', $menu->id)}}" class="btn btn-success">
                               <i class="fas fa-fw fa-eye"></i> 
                             </a>
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

@if (session('eliminar')== '¡Menú eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'El menú ha sido eliminado con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Este menú se eliminará definitivamente",
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