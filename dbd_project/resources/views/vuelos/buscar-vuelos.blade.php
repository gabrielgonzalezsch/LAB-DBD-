@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Vuelos</h1>
    <p class="lead">Aqui se muestran los vuelos</p>
    <div class="ui fluid category search">
      {!! Form::open(['route'=>'vuelos.buscar', 'method' => 'GET']) !!}
        <div class="ui icon input">
        {{Form::text('filtro', '', ['class' => 'form-control promt', 'placeholder' => 'Busca tu vuelo según destino...'])}}
        <i class="search icon"></i>
        </div>
       {{Form::submit('Buscar', ['class' => 'btn btn-primary'])}}
      {!! Form::close() !!}
      <div id="resultados" class="results"></div>
    </div>
  </div>
</div>
<div class="ui fluid container">
  <div class="ui segment">
    <h1 class="ui horizontal divider header">Todos los vuelos: </h1>
    @if(count($vuelos) > 0)
    <div class="ui three stackable cards">
    @foreach($vuelos as $vuelo)
      <div class="ui fluid raised card">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: {{$vuelo->valor_turista}}
          </div>
          <div class="ui horizontal divider header">{{$vuelo->nombre_avion}}</div>
          <small>De {{$vuelo->aeropuerto_origen}} hasta {{$vuelo->aeropuerto_destino}} !!</small>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Dirección:</div>
            <div class="content">
              {{$vuelo->aeropuerto_origen}} >>>>>>>>> {{$vuelo->aeropuerto_destino}}
            </div>
          </div>
          <div class="item">
            <div class="header">Aereolinea</div>
            <div class="content">
              {{$vuelo->nombre_aerolinea}}
            </div>
          </div>
          @if($vuelo->descuento > 0)
          <div class="item">
            <div class="header">Este vuelo tiene {{$vuelo->descuento}}% de descuento!!</div>
          </div>
          @endif
          <a href="/vuelos/{{$vuelo->id_vuelo}}" class="ui bottom attached blue button">
          <i class="fas fa-search"></i>
          Ver detalles del vuelo
          </a>
        </div>
      </div>
    @endforeach
    </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$vuelos->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @else
    <p>No se encontraron vuelos!</p>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @endif
</div>
</div>
@endsection
