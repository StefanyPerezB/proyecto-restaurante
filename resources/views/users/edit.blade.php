@extends('adminlte::page')

@section('title','Usuario')


@section('content')

<div align="center">
    <h1 align="center" style="font-size: 50px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Editar usuario</h1>
</div>

<div>

            <div class="card-body">
                <label for="" class="col-form-label" style="font-size: 20px">Nombre del usuario:</label>
                {{-- <label for="" class=" col-form-label" style="font-size: 20px"> <br>{{$user->name}}</label> --}}
                <input type="text"  class="form-control text-lg" name="" id="" value={{$user->name}} disabled>

                <label for="" class="col-form-label" style="font-size: 20px; margin-top: 13px">Otros usuarios:</label>


              {!! Form::model($user, ['route'=> ['users.update', $user], 'method' => 'put']) !!}
               @foreach ($roles as $role)
              <div style="margin-top: 10px">
                <label style="font-size: 18px" class="form-label">
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
              </div>
          @endforeach

           {!! Form::submit('Actualizar usuario', ['class' => 'btn btn-success float-left mt-2']) !!}

      {!! Form::close() !!}      

        </div>

@endsection
