@extends('layouts.app')

@section('title', 'Registrar usuario')

@section('content')
  <!--<style>
    #form-control{
      width: 300px;
    }
  </style>
  Esto no funciona...
  -->
    {!! Form::open(['action'=>'ControllerUsuarios@store', 'method' => 'POST']) !!}
    <div>
      {{Form::label('username', 'Nombre de usuario: ')}}
      {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario'])}}
      {{Form::label('email', 'Nombre correo: ')}}
      {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Ingrese correo'])}}
      {{Form::label('pass', 'Contraseña: ')}}
      {{Form::text('pass', '', ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña'])}}
      {{Form::label('confirm-pass', 'Confirmar contraseña: ')}}
      {{Form::text('confirm-pass', '', ['class' => 'form-control', 'placeholder' => 'Confirme contraseña'])}}
    </div>
      {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
      <a class='btn btn-primary' href='/'> Volver</a>
    {!! Form::close() !!}
@endsection
