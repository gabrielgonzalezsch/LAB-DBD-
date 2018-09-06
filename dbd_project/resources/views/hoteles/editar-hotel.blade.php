@extends('layouts.app')

@section('title', 'Editar hotel')

@section('content')
<div>
  {!! Form::open(['route'=> ['hotel.update', $hotel->id_hotel], 'method' => 'PATCH']) !!}
  {{Form::label('nombre_hotel', 'Nombre hotel: ')}}
  {{Form::text('nombre_hotel', '', ['class' => 'form-control', 'placeholder' => $hotel->nombre_hotel])}}
  {{Form::label('pais', 'País:')}}
  {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => $hotel->pais])}}
  {{Form::label('ciudad', 'Ciudad:')}}
  {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => $hotel->ciudad])}}
  {{Form::label('direccion', 'Dirección:')}}
  {{Form::text('direccion', '', ['class' => 'form-control', 'placeholder' => $hotel->direccion])}}
  {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/hoteles/{{$hotel->id_hotel}}'> Volver</a>
</div>
{!! Form::close() !!}

@stop
