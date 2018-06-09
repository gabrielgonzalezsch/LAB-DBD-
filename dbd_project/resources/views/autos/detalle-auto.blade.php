@extends('layouts.app')
@section('content')
  <h1>Detalles del auto: {{$auto->modelo_auto}}</h1>
    <ul>
      <li><h3>Precio por dia: {{$auto->precio_por_dia}} </h3></li>
      <li><h3>Compañía: {{$auto->compañia}} </h3></li>
      <li><h4>Descripcion del auto: {{$auto->descripcion_auto}}</h4></li>
      <li><h4>N° Patente {{$auto->patente}}</h4></li>
    </ul>
    <h2>Detalles del arriendo: </h2>
    <ul>
      <li><h3>Pais: {{$auto->pais_arriendo}} </h3></li>
      <li><h3>Ciudad: {{$auto->ciudad_arriendo}} </h3></li>
      <li><h3>Calle: {{$auto->calle_arriendo}} </h3></li>
    </ul>
    <a href="/" class="button" role="button"> Volver </a>
    <a href="#" class="button" role="button"> Arrendar </a>

@endsection
