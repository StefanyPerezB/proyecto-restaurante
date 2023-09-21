@extends('adminlte::page')

@section('title','Roles')


@section('content')

<div align="center">
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar roles</h1>
</div>

<div>
{{-- PARA BOTON GUARDAR --}}
  <div id="mensaje" style="margin-bottom: 20px">
    @if(Session::has('datos'))
        <div class="alert alert-success shadow-lg">
            {{ Session::get('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
  </div>

  @can('roles.create')
  <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Nuevo rol</a>
  @endcan

  <table id="example" class="table table-striped table-bordered shadow-lg mt-4 "  style="margin-top: 30px">
    <thead class="bg-primary text-while" >
      <tr align="center">
        <th>#</th>
        <th>Nombre del usuario</th>
        <th>Opciones</th>
      </tr>

    </thead>


    <tbody>
      @foreach ($roles as $role) 
      
      <tr align="center">
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>

        @can('roles.edit')
        <div class="btn-group">
       <td align="center">
          <a href="{{route('roles.edit', $role)}}" class="btn btn-info btn-circle btn-sm">
            <i class="fas fa-fw fa-pen"></i>
          </a>
        @endcan


        @can('roles.destroy')
            <form action="{{route('roles.destroy', $role)}}" method="POST" class="formulario-rol" style="margin-top: 10px">
                @csrf
                   @method('DELETE')
                   <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></button>
              </form>
       
        @endcan
      </div>
    </td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

@if (session('eliminar')== '¡Rol eliminado correctamente!')
    <script>
     Swal.fire(
       '¡Eliminado!',
     'El rol ha sido eliminado con éxito',
       'success'
     )
    </script>
@endif

<script>
  $('.formulario-rol').submit(function(e){
  e.preventDefault();
  Swal.fire({
  title: '¿Estás seguro?',
  text: "Este rol se eliminará definitivamente",
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

@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet"> 


@endsection