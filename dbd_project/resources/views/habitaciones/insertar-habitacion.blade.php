@extends('layouts.app')

@section('title', 'Insertar una habitación')

@section('content')
<div>
  {!! Form::open(['action'=> 'ControllerHabitaciones@store']) !!}
  {{Form::label('num_hab', 'Número habitación: ')}}
  {{Form::text('num_hab', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('precio', 'Precio por noche: ')}}
  {{Form::text('precio', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descripcion', 'Descripción: ')}}
  {{Form::text('descripcion', '', ['class' => 'form-control', 'placeholder' => ''])}}
  <div>
  {{Form::label('inc_desayuno', 'Incluye desayuno? ')}}
  {{Form::hidden('inc_desayuno', false)}}
  {{Form::checkbox('inc_desayuno', true)}}
  {{Form::label('inc_aircon', 'Incluye aire acondicionado? ')}}
  {{Form::hidden('inc_aircon', false)}}
  {{Form::checkbox('inc_aircon', true)}}
  {{Form::label('inc_servicio', 'Incluye servicio al cuarto? ')}}
  {{Form::hidden('inc_servicio', false)}}
  {{Form::checkbox('inc_servicio', true)}}
  </div>
  {{Form::label('num_camas_dob', 'Número de camas dobles: ', ['class' => 'has-new-line'])}}
  {{Form::text('num_camas_dob', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('num_camas_simp', 'Número de camas simples: ')}}
  {{Form::text('num_camas_simp', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('size', 'Número metros cuadrados: ')}}
  {{Form::text('size', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::hidden('id_hotel', $id_hotel)}}
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
</div>
{!! Form::close() !!}

@stop
