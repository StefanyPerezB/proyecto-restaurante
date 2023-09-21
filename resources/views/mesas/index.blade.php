@extends('adminlte::page')

@section('title', 'Mesa')

@section('content_header')
 
@stop

@section('content')
   <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar Mesas</h1>

@can('mesas.create')
 <a href="{{ route('mesas.create') }}" class="btn btn-primary mb-3">Nueva mesa</a>
@endcan

  <!--Ejemplo tabla con DataTables-->

  <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="example" class="table table-striped table-bordered shadow-lg mt-4 " cellspacing="0" width="100%">
                    <thead class="bg-primary text-while" >
                        <tr align="center">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>  
                            <th>Estado</th>                             
                            <th>Ubicación</th>   
                            <th>Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                      @foreach ( $mesas as $mesa )

                      <tr>
                        <td align="center">{{$mesa->id}}</td>
                     <td align="center">{{ $mesa->nombre }}</td>
                     <td align="center">
                        {{ $mesa->cantidad }}
                     </td>

                     <td align="center">
                      @switch($mesa->estado)
                      @case('Pendiente')
                      <span >Pendiente</span>
                          @break
                      @case('Disponible')
                      <span >Disponible</span>
                          @break
                      @case('No disponible')
                      <span>No disponible</span>
                          @break
                      @endswitch
                     </td>

                     <td align="center">
                      @switch($mesa->locacion)
                      @case('Entrada')
                      <span >Entrada</span>
                          @break
                      @case('Frente cocina')
                      <span >Frente a la cocina</span>
                          @break
                      @case('Salón')
                      <span >Salón</span>
                          @break
                      @endswitch
                    </td>
            
                    <td align="center">
                      <div class="btn-group">
                        @can('mesas.edit')
                         <a href="{{route('mesas.edit', $mesa->id)}}" class="btn btn-info">
                            <i class="fas fa-fw fa-pen"></i> 
                          </a>
                        @endcan

                        @can('mesas.destroy')
                         <form action="{{route('mesas.destroy', $mesa->id)}}" method="POST" class="formulario-eliminar" width:50px>
                            @csrf
                               @method('DELETE')
                               <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </form>
                        @endcan

                        @can('mesas.show')
                         <a href="{{route('mesas.show', $mesa->id)}}" class="btn btn-success">
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
 'Esta mesa ha sido eliminada con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Esta mesa se eliminará definitivamente",
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 

<script>
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>



@stop