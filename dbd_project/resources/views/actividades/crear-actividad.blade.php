@extends('layouts.app')

@section('title', 'Insertar actividad')

@section('content')
{!! Form::open(['action'=>'ControllerActividades@store', 'method' => 'POST']) !!}
<div>
  {{Form::label('nombre_actividad', 'Nombre actividad: ')}}
  {{Form::text('nombre_actividad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descripcion_actividad', 'Descripción actividad: ')}}
  {{Form::text('descripcion_actividad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  <div class="form-group">
    {{Form::label('fecha_inicio', 'Fecha  de inicio:')}}
    {{Form::date('fecha_inicio', \Carbon\Carbon::now())}}
    {{Form::label('fecha_termino', 'Fecha termino:')}}
    {{Form::date('fecha_termino', \Carbon\Carbon::now())}}
  </div>
  {{Form::label('pais', 'País:')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('ciudad', 'Ciudad:')}}
  {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('calle', 'Calle:')}}
  {{Form::text('calle', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('valor_entrada', 'Precio de entrada:')}}
  {{Form::text('valor_entrada', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('cupos', 'Cupos:')}}
  {{Form::text('cupos', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('descuento', 'Descuento:')}}
  {{Form::text('descuento', '', ['class' => 'form-control', 'placeholder' => ''])}}
</div>
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
{!! Form::close() !!}
@stop
