@extends('layouts.app')
<header>
@section('content')
  <h1>Todos los hoteles: </h1>
  @if(count($hoteles) > 0)
    <ul>
      @foreach($hoteles as $hotel)
      @if($hotel->habitaciones_disponibles >= 0)
      <li>
        <h3><a href="/hoteles/{{$hotel->ID_hotel}}">{{$hotel->nombre_hotel}}</a></h3>
        <small>Ubicación: {{$hotel->ciudad}}, {{$hotel->direccion}}</small>
        <small>Valor por dia: {{$hotel->precio_min_habitacion}}</small>
      </li>
      @endif
      @endforeach
    </ul>
    {{$hoteles->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron hoteles!</p>
    <a href="/" class="button" role="button"> Volver </a>
  @endif

@endsection
