@extends('layouts.app')

@section('title', 'Editar aeropuerto')

@section('content')
{!! Form::open(['action'=> ['ControllerAeropuerto@update', 'id' => $aeropuerto->id_aeropuerto], 'method' => 'PATCH']) !!}
<div>
  {{Form::label('pais', 'Pais aeropuerto: ')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('ciudad', 'Ciudad:')}}
  {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('latitud', 'Latitud:')}}
  {{Form::text('latitud', '', ['class' => 'form-control', 'placeholder' => ''])}}
  {{Form::label('longitud', 'Longitud:')}}
  {{Form::text('longitud', '', ['class' => 'form-control', 'placeholder' => ''])}}
</div>
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/'> Volver</a>
{!! Form::close() !!}

@stop
