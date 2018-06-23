@extends('layouts.app')

@section('title', 'Insertar nuevo hotel')

@section('content')
<div>
  {!! Form::open(['action'=>'ControllerHoteles@store', 'method' => 'POST']) !!}
  {{Form::label('nombre_hotel', 'Nombre hotel: ')}}
  {{Form::text('nombre_hotel', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('pais', 'País:')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('ciudad', 'Ciudad:')}}
  {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('direccion', 'Dirección:')}}
  {{Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
</div>
{!! Form::close() !!}

@stop
