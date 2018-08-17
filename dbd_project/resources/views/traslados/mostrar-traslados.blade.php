@extends('layouts.app')
<header>
@section('content')
  <h1>Todas los traslados: </h1>
  @if(count($traslados) > 0)
    <ul>
      @foreach($traslados as $traslado)
      <li>
        <h3><a href="/traslados/{{$traslado->id_traslado}}">{{$traslado->tipo_vehiculo}}</a></h3>
        <small>Tarifa por kilómetro: {{$traslado->tarifa_por_kilometro}}</small>
      </li>
      @endforeach
    </ul>
    {{$traslados->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron traslados</p>
    <a href="/" class="button" role="button"> Volver </a>
  @endif

@endsection
