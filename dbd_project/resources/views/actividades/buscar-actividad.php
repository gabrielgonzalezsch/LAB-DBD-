@extends('layouts.app')
<header>
@section('content')
  <h1>Todas las actividades: </h1>
  @if(count($actividades) > 0)
    <ul>
      @foreach($actividades as $actividades)
      <li>
        <h3><a href="/actividades/{{$actividades->id_actividades}}">{{$actividades->nombre_actividad}}</a></h3>
        <small>Valor por dia: {{$actividades->precio_normal}}</small>
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