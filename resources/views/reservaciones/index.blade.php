@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
 
@stop

@section('content')
   <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar Reservaciones</h1>

   @can('reservaciones.create')
 <a href="{{ route('reservaciones.create') }}" class="btn btn-primary mb-3">Nueva reservación</a>
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
                            <th>Apellido</th>  
                            <th>Correo electrónico</th>                             
                            <th>Teléfono</th>   
                            <th>Fecha y hora</th>
                            <th>Número de mesa</th>
                            <th>Número de personas</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                     @foreach ( $reservaciones as $reservacion )

                      <tr>
                        <td align="center">{{$reservacion->id}}</td>
                     <td align="center">{{ $reservacion->nombre }}</td>
                     <td align="center">
                        {{ $reservacion->apellido }}
                     </td>

                     <td align="center">
                        {{ $reservacion->correo}}
                     </td>

                     <td align="center">
                        {{ $reservacion->numero }}
                    </td>
                    <td align="center">
                        {{ $reservacion->fecha }}
                    </td>
                    <td align="center">
                        @foreach ($mesas as $item)
                        @if ($reservacion->id_mesa == $item->id)
                            {{ $item->nombre}}
                        @endif
                        @endforeach
                    </td>
                    <td align="center">
                        {{ $reservacion->cantidad }}
                    </td>
            
                    <td align="center">
                      <div class="btn-group">
                        @can('reservaciones.edit')
                         <a href="{{route('reservaciones.edit', $reservacion->id)}}" class="btn btn-info">
                            <i class="fas fa-fw fa-pen"></i> 
                          </a>
                          @endcan

                          @can('reservaciones.destroy')
                         <form action="{{route('reservaciones.destroy', $reservacion->id)}}" method="POST" class="formulario-eliminar" >
                            @csrf
                               @method('DELETE')
                               <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </form>
                          @endcan

                          @can('reservaciones.show')
                          <a href="{{route('reservaciones.show', $reservacion->id)}}" class="btn btn-success" style="margin-right: 5px" width:50px>
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

@if (session('eliminar')== '¡Reservación eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'Esta reservación ha sido eliminada con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Esta reservación se eliminará definitivamente",
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