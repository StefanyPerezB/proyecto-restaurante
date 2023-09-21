@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
 
@stop

@section('content')
   <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar Categorías</h1>

   <div id="mensaje" style="margin-bottom: 20px">
    @if(Session::has('datos'))
        <div class="alert alert-info shadow-lg">
            {{ Session::get('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
  </div>

@can('categorias.create')
 <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Nueva categoría</a>
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
                            <th align="center">Nombre de la categoría</th>
                            <th align="center">Nombre del aperitivo</th>
                            <th align="center">Imagen</th>                               
                            <th align="center">Descripcion</th>
                            <th align="center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ( $categorias as $categoria )

                      <tr>
                        <td align="center">{{$categoria->id}}</td>
                     <td align="center">{{ $categoria->nombre }}</td>
                     <td align="center">{{ $categoria->nombrec }}</td>
                     <td align="center">
                        <img src="{{$categoria->imagen}}" alt="{{$categoria->nombre}}" class="img-fluid" width="120px">
                     </td>
                     <td align="center">{{ $categoria->descripcion }}</td>
            
                         <td align="center">
                           <div class="btn-group">
                            @can('categorias.edit')
                              <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-info" >
                                 <i class="fas fa-fw fa-pen"></i> 
                               </a>
                            @endcan

                            @can('categorias.destroy')
                              <form action="{{route('categorias.destroy', $categoria->id)}}" method="POST" class="formulario-eliminar">
                                 @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               </form>
                            @endcan

                            @can('categorias.show')
                            <a href="{{route('categorias.show', $categoria->id)}}" class="btn btn-success" >
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

@if (session('eliminar')== '¡Categoria eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'La categoria ha sido eliminada con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Esta categoria se eliminará definitivamente",
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