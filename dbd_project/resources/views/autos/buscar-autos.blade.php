@extends('layouts.app')
<header>
@section('content')
  <h1>Todos los Autos: </h1>
  @if(count($autos) > 0)
    <ul>
      @foreach($autos as $auto)
      <li>
        <h3><a href="/autos/{{$auto->id_auto}}">{{$auto->modelo_auto}}</a></h3>
        <small>Valor por dia: {{$auto->precio_por_dia}}</small>
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
