@extends('adminlte::page')

@section('title','Usuarios')


@section('content')

<div align="center">
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar usuarios</h1>
</div>

<div>
{{-- PARA BOTON GUARDAR --}}
  <div id="mensaje" style="margin-bottom: 20px">
    @if(Session::has('datos'))
        <div class="alert alert-success">
            {{ Session::get('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
  </div>

  <table id="example" class="table table-striped table-bordered shadow-lg mt-4 "   style="margin-top: 30px">
    <thead class="bg-primary text-while">
      <tr align="center">
        <th>ID</th>
        <th>NOMBRE</th>
        <th>EMAIL</th>
        <th>OPCIONES</th>
      </tr>

    </thead>


    <tbody>
      @foreach ($users as $user) 
      <tr align="center">
        <td>{{ $user->id}}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
       <td>
        @can('users.edit')
        
          <a href="{{route('users.edit', $user)}}" class="btn btn-info btn-circle btn-sm">
            <i class="fas fa-fw fa-pen"></i>
          </a>
        
       @endcan

           @can('users.destroy')
                              <form action="{{route('users.destroy', $user->id)}}" method="POST" class="formulario-eliminar" style="margin-top: 10px">
                                 @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               </form>
          @endcan
       
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>
@endsection

@section('js')

<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 

@if (session('eliminar')== '¡Categoria eliminada correctamente!')
<script>
 Swal.fire(
   '¡Eliminado!',
 'El usuario ha sido eliminado con éxito',
   'success'
 )
</script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
e.preventDefault();
Swal.fire({
title: '¿Estás seguro?',
text: "Este usuario se eliminará definitivamente",
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

@endsection

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet"> 

@endsection
