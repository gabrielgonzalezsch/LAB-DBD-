@extends('layouts.app')
@section('content')
  <h1>Detalles del vuelo: {{$vuelo->nombre_avion}}</h1>
    <ul>
      <li><h3>>Aerolinea: {{$vuelo->aerolinea}} </h3></li>
      <li><h3>>Viaje: {{$vuelo->aeropuerto_origen}} >>>>> {{$vuelo->aeropuerto_destino}} </h3></li>
      <li><h4>Salida: {{$vuelo->fecha_salida}}, {{$vuelo->hora_salida}}</h4></li>
      <li><h4>Llegada:{{$vuelo->fecha_llegada}}, {{$vuelo->hora_llegada}}</h4></li>
      <li>Tiempo de viaje: {{$horas}}</li>
      <li>Valor turista: {{$vuelo->valor_turista}}</li>
      <li>Valor ejecutivo: {{$vuelo->valor_ejecutivo}}</li>
      <li>Valor primera clase: {{$vuelo->valor_primera_clase}}</li>
    </ul>
    <a href="/" class="button" role="button"> Volver </a>

@endsection
