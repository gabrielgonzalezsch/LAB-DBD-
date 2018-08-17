@extends('layouts.app')
<header>
@section('content')
  <h1>Todas las actividades: </h1>
  @if(count($actividades) > 0)
    <ul>
      @foreach($actividades as $actividad)
      <li>
        <h3><a href="/actividades/{{$actividad->id_actividad}}">{{$actividad->nombre_actividad}}</a></h3>
        <small>Valor por dia: {{$actividad->precio_normal}}</small>
      </li>
      @endforeach
    </ul>
    {{$actividades->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron actividades</p>
    <a href="/" class="button" role="button"> Volver </a>
  @endif

@endsection
