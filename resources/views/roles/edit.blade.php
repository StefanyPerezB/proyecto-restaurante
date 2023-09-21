@extends('adminlte::page')

@section('title','Roles')


@section('content')

<div align="center">
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Editar roles</h1>
</div>

<div>
  <div class="card-body">
    <div class="form-group row">
      @if (session('info'))
          <div class="alert alert-success">
           {{session('info')}}
          </div>
      @endif

          <div class="card-body" >
              {!! Form::model($role, ['route'=> ['roles.update', $role], 'method' => 'put']) !!}
              @include('roles.partials.form')
   
             {!! Form::submit('Actualizar rol', ['class' => 'btn btn-success']) !!}
             {!! Form::close() !!}       
      </div>
    </div>

@endsection