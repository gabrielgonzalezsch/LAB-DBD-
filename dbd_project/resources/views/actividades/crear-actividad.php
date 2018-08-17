@extends('layouts.app')

@section('title', 'Insertar actividad')

@section('content')
{!! Form::open(['action'=>'ControllerActividad@store', 'method' => 'POST']) !!}
<div>
  {{Form::label('nombre_actividad', 'Nombre actividad: ')}}
  {{Form::text('nombre_actividad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descripcion_actividad', 'Descripción actividad: ')}}
  {{Form::text('descripcion_actividad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('fecha_inicio', 'Fecha  de inicio:')}}
  {{Form::text('fecha_inicio', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('fecha_termino', 'Fecha termino:')}}
  {{Form::text('fecha_termino', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('pais', 'País:')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('calle', 'Calle:')}}
  {{Form::text('calle', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('valor_entrada', 'Precio de entrada:')}}
  {{Form::text('valor_entrada', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('cupos', 'Cupos:')}}
  {{Form::text('cupos', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('precio_normal', 'Precio final:')}}
  {{Form::text('precio_normal', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descuento', 'Descuento auto:')}}
  {{Form::text('descuento', '', ['class' => 'form-control', 'placeholder' => ''])}}
</div>
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
{!! Form::close() !!}
@stop
