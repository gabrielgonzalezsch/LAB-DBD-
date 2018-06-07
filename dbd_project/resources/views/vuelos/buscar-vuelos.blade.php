@extends('layouts.app')
<header>
@section('content')
  <h1>Todos los vuelos: </h1>
  @if(count($vuelos) > 0)
    <ul>
      @foreach($vuelos as $vuelo)
      <li>
        <h3><a href="/vuelos/{{$vuelo->ID_vuelo}}">{{$vuelo->nombre_avion}}</a></h3>
        <small>De {{$vuelo->aeropuerto_origen}} hasta {{$vuelo->aeropuerto_destino}} !!</small>
      </li>
      @endforeach
    </ul>
    {{$vuelos->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron vuelos!</p>
  @endif

@endsection
