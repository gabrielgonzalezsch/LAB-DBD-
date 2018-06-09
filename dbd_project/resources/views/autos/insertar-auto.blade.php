@extends('layouts.app')

@section('title', 'Insertar auto')

@section('content')
{!! Form::open(['action'=>'ControllerAutos@store', 'method' => 'POST']) !!}
<div>
  {{Form::label('mod-auto', 'Modelo auto: ')}}
  {{Form::text('mod-auto', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('comp', 'Compañía:')}}
  {{Form::text('comp', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('pat', 'Patente:')}}
  {{Form::text('pat', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('pais-arr', 'Pais de arriendo:')}}
  {{Form::text('pais-arr', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('ciudad-arr', 'Ciudad de arriendo:')}}
  {{Form::text('ciudad-arr', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('calle-arr', 'Calle de arriendo:')}}
  {{Form::text('calle-arr', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('precio-por-dia', 'Precio por dia:')}}
  {{Form::text('precio-por-dia', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('cap-pasajeros', 'Capacidad pasajeros:')}}
  {{Form::text('cap-pasajeros', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('desc-auto', 'Descripcion auto:')}}
  {{Form::text('desc-auto', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descuento', 'Descuento auto:')}}
  {{Form::text('descuento', '', ['class' => 'form-control', 'placeholder' => ''])}}
</div>
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
{!! Form::close() !!}

@stop
