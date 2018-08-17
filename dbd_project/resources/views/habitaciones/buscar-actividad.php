@extends('layouts.app')
<header>
@section('content')
  <h1>Todos los Autos: </h1>
  @if(count($autos) > 0)
    <ul>
      @foreach($autos as $actividades)
      <li>
        <h3><a href="/actividades/{{$actividades->id_actividades}}">{{$actividades->nombre_actividad}}</a></h3>
        <small>Valor por dia: {{$actividades->precio_normal}}</small>
      </li>
      @endforeach
    </ul>
    {{$autos->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron autos!</p>
    <a href="/" class="button" role="button"> Volver </a>
  @endif

@endsection