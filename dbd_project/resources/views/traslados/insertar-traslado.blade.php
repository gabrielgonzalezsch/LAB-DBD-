@extends('layouts.app')

@section('title', 'Insertar auto')

@section('content')
{!! Form::open(['action'=>'ControllerTraslados@store', 'method' => 'POST']) !!}
<div>
  {{Form::label('tipo_vehiculo', 'Tipo vehículo: ')}}
  {{Form::text('tipo_vehiculo', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('patente', 'Patente:')}}
  {{Form::text('patente', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('pais', 'Pais de arriendo:')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('ciudad', 'Ciudad de arriendo:')}}
  {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  <div class="form-group">
  {{Form::label('inicio_servicio', 'Inicio servicio:')}}
  <input type="time" name="inicio_servicio" />
  {{Form::label('fin_servicio', 'Fin servicio:')}}
  <input type="time" name="fin_servicio" />
  </div>
  {{Form::label('cap_pasajeros', 'Número de pasajeros: ')}}
  {{Form::text('cap_pasajeros', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('tarifa_por_kilometro', 'Tarifa por kilómetro: ')}}
  {{Form::text('tarifa_por_kilometro', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descuento', 'Descuento:')}}
  {{Form::text('descuento', '', ['class' => 'form-control', 'placeholder' => 'En porcentaje'])}}
</div>
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
{!! Form::close() !!}

@stop
