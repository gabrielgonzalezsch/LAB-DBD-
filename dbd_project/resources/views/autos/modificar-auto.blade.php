@extends('layouts.app')

@section('title', 'Editar auto')

@section('content')
{!! Form::open(['action'=> ['ControllerAutos@update', 'id' => $auto->id_auto], 'method' => 'PATCH']) !!}
<div>
  {{Form::label('mod-auto', 'Modelo auto: ')}}
  {{Form::text('mod-auto', $auto->modelo_auto, ['class' => 'form-control'])}}
  {{Form::label('comp', 'Compañía:')}}
  {{Form::text('comp', $auto->compañia, ['class' => 'form-control'])}}
  {{Form::label('pat', 'Patente:')}}
  {{Form::text('pat', $auto->patente, ['class' => 'form-control'])}}
  {{Form::label('pais-arr', 'Pais de arriendo:')}}
  {{Form::text('pais-arr', $auto->pais_arriendo, ['class' => 'form-control'])}}
  {{Form::label('ciudad-arr', 'Ciudad de arriendo:')}}
  {{Form::text('ciudad-arr', $auto->ciudad_arriendo, ['class' => 'form-control'])}}
  {{Form::label('calle-arr', 'Calle de arriendo:')}}
  {{Form::text('calle-arr', $auto->calle_arriendo, ['class' => 'form-control'])}}
  {{Form::label('precio-por-dia', 'Precio por dia:')}}
  {{Form::text('precio-por-dia', $auto->precio_por_dia, ['class' => 'form-control'])}}
  {{Form::label('cap-pasajeros', 'Capacidad pasajeros:')}}
  {{Form::text('cap-pasajeros', $auto->cap_pasajeros, ['class' => 'form-control'])}}
  {{Form::label('desc-auto', 'Descripcion auto:')}}
  {{Form::text('desc-auto', $auto->descripcion_auto, ['class' => 'form-control'])}}
  {{Form::label('descuento', 'Descuento auto:')}}
  {{Form::text('descuento', $auto->descuento, ['class' => 'form-control'])}}
  {{Form::label('ya_reservado', 'Ya reservado ')}}
  {{Form::checkbox('ya_reservado', true, $auto->ya_reservado,  ['class' => 'ui checkbox'])}}
</div>
  {{Form::submit('Confirmar edición', ['class' => 'btn btn-primary'])}}
  <a class='btn btn-primary' href='/autos'> Cancelar </a>
{!! Form::close() !!}

@stop
