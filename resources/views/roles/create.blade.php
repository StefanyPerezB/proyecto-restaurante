@extends('adminlte::page')

@section('title','Roles')


@section('content')

<div align="center">
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Administrar roles</h1>
</div>

<div>
            <div class="card-body" >
              {{-- <div class="form-group row">  --}}
                  {!! Form::open(['route' => 'roles.store']) !!}
               
                  @include('roles.partials.form')
  
                {!! Form::submit('Crear rol', ['class' => 'btn btn-success']) !!}                 
                {!! Form::close() !!}                                       
              {{-- </div> --}}            
            </div>

</div>

@endsection