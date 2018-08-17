@extends('layouts.app')

@section('title', 'Insertar una habitación')
@section('content')
<div>
  {!! Form::open(['route'=> ['habitacion.update', $habitacion->id_habitacion], 'method' => 'POST']) !!}
  {{Form::label('num_hab', 'Número habitación: ')}}
  {{Form::text('num_hab', '', ['class' => 'form-control', 'placeholder' => $habitacion->num_habitacion])}}
  {{Form::label('precio', 'Precio por noche: ')}}
  {{Form::text('precio', '', ['class' => 'form-control', 'placeholder' => $habitacion->precio_por_noche])}}
  {{Form::label('descripcion', 'Descripción: ')}}
  {{Form::text('descripcion', '', ['class' => 'form-control', 'placeholder' => $habitacion->descripcion])}}
  <div>
  {{Form::label('ya_reservado', 'Está reservado? ')}}
  {{Form::hidden('ya_reservado', false)}}
  {{Form::checkbox('ya_reservado', $habitacion->ya_reservado)}}
  {{Form::label('valoracion', 'Valoración ')}}
  <input type="number" min="1" max="5" name="valoracion"/>
  {{Form::label('inc_desayuno', 'Incluye desayuno? ')}}
  {{Form::hidden('inc_desayuno', false)}}
  {{Form::checkbox('inc_desayuno', $habitacion->incluye_desayuno)}}
  {{Form::label('inc_aircon', 'Incluye aire acondicionado? ')}}
  {{Form::hidden('inc_aircon', false)}}
  {{Form::checkbox('inc_aircon', $habitacion->incluye_aire_acondicionado)}}
  {{Form::label('inc_servicio', 'Incluye servicio al cuarto? ')}}
  {{Form::hidden('inc_servicio', false)}}
  {{Form::checkbox('inc_servicio', $habitacion->incluye_servicio)}}
  </div>
  {{Form::label('num_camas_dob', 'Número de camas dobles: ', ['class' => 'has-new-line'])}}
  {{Form::text('num_camas_dob', '', ['class' => 'form-control', 'placeholder' => $habitacion->num_camas_dobles])}}
  {{Form::label('num_camas_simp', 'Número de camas simples: ')}}
  {{Form::text('num_camas_simp', '', ['class' => 'form-control', 'placeholder' => $habitacion->num_camas_simples])}}
  {{Form::label('size', 'Número metros cuadrados: ')}}
  {{Form::text('size', '', ['class' => 'form-control', 'placeholder' => $habitacion->room_size])}}
  {{Form::label('descuento', 'Descuento: ')}}
  <input type="number" min="0" max="100" name="descuento" class="form-control" placeholder="{{$habitacion->descuento}}" />
  {{Form::hidden('id_hotel', $habitacion->id_hotel)}}
  {{Form::submit('Editar', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
</div>
{!! Form::close() !!}

@stop
