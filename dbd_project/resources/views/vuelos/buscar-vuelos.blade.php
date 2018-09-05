@extends('layouts.app')
@section('content')
<style>
  .form-group, .form-control{
    margin-left: 5px;
    margin-right: 5px;
  }
  .container{
    background-color: orange
    
  }
  .jumbotron{
    background-color:orange;
  }
</style>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Elige tu vuelo</h1>
    <p class="lead">Ingresa los datos y escogeremos ¡los mejores vuelos para ti!</p>
    <div class="container">
      {!! Form::open(['route'=>'vuelos.buscar', 'method' => 'GET', 'id' => 'busqueda']) !!}
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inicio">Escribe la ciudad de origen...</label>
          {{Form::text('origen', '', ['class' => 'form-control promt', 'placeholder' => 'Escribe la ciudad de origen...'])}}
        </div>
        <div class="form-group col-md-3">
          <label for="destino">Escribe la ciudad de destino...</label>
            {{Form::text('destino', '', ['class' => 'form-control promt', 'placeholder' => 'Escribe la ciudad de destino...'])}}
        </div>
        <div class="form-group col">
          <div class="form-check">
              <input onclick="toggleVuelta(this)" class="form-check-input" type="checkbox" name="idaVuelta" id="idaVuela" checked>
              <label class="form-check-label" for="idayvuelta">
              Ida y vuelta
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" name="sinFecha" id="sinFecha">
              <label class="form-check-label" for="sinFecha">
              No he pensado en una fecha
              </label>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div id="fecha_ida" class="form-group col-md-3">
          <label for="fechaPartida" class="ui input label"> Elige la fecha de partida... </label>
          {{Form::date('fechaPartida', '', ['id' => 'fechaIda', 'class' => 'form-control promt'])}}
        </div>
        <div id="fecha_vuelta" class="form-group col-md-3">
          <label for="fechaLlegada" class="ui input label"> Elige la fecha de regreso... </label>
          {{Form::date('fechaLlegada', '', ['id' => 'fechaVuelta', 'class' => 'form-control promt'])}}
        </div>
      </div>
      <div class="row">
        <div class="col">
          {{Form::submit('Buscar', ['class' => 'btn btn-primary'])}}
          {!! Form::close() !!}
          <div id="resultados" class="results"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@if(isset($vuelos))
<div class="ui fluid container">
  <div class="ui segment">
    <h1 class="ui horizontal divider header">Todos lo vuelos: </h1>
    @if(count($vuelos) > 0)
    <div class="ui three stackable cards">
    @foreach($vuelos as $vuelo)
      <div class="ui fluid raised card">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: {{$vuelo->valor_turista}}
          </div>
          <div class="ui horizontal divider header">{{$vuelo->nombre_avion}}</div>
          <center><img src="images/{{$vuelo->nombre_aerolinea}}.png" width="100%" height = 220px></center>
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
          Seleccionar vuelo
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
@endif
@if(isset($joint_vuelos))
<div class="ui fluid container">
  <div class="ui segment">
    <h1 class="ui horizontal divider header">Todos los vuelos ida y vuelta: </h1>
      @if(count($joint_vuelos) > 0)
      <div class="ui three stackable cards">
      @foreach($joint_vuelos as $joint_vuelo)
        <div class="ui fluid raised card">
          <div class="content">
            <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
              Precios desde: {{$joint_vuelo['ida']['valor_turista'] + $joint_vuelo['vuelta']['valor_turista']}}
            </div>
            <div class="ui horizontal divider header">{{$joint_vuelo['ida']['nombre_avion']}} y {{$joint_vuelo['vuelta']['nombre_avion']}}</div>
            <small>Vuelo ida vuelta {{$joint_vuelo['ida']['aeropuerto_origen']}} con {{$joint_vuelo['ida']['aeropuerto_destino']}} !!</small>
          </div>
          <div style="padding: 20px;" class="ui relaxed divided list">
            <div class="item">
              <div class="header">Dirección:</div>
              <div class="content">
                {{$joint_vuelo['ida']['aeropuerto_origen']}} >>>> {{$joint_vuelo['ida']['aeropuerto_destino']}} >>>> {{$joint_vuelo['ida']['aeropuerto_origen']}}
              </div>
            </div>
            <div class="item">
              <div class="header">Aereolinea</div>
              <div class="content">
                {{$joint_vuelo['ida']['nombre_aerolinea']}}, {{$joint_vuelo['vuelta']['nombre_aerolinea']}}
              </div>
            </div>
            @if($joint_vuelo['ida']->descuento > 0)
            <div class="item">
              <div class="header">El vuelo tiene {{$joint_vuelo['ida']['descuento']}}% de descuento!!</div>
            </div>
            @endif
            <a href="/vuelos/{{$joint_vuelo['ida']['id_vuelo']}}" class="ui bottom attached blue button">
            <i class="fas fa-search"></i>
            Seleccionar vuelo
            </a>
          </div>
        </div>
      @endforeach
      </div>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
    @else
      <p>No se encontraron vuelos!</p>
      <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
    @endif
  </div>
</div>

<style>

  .container{
    display: none;
    font-size: 16px;
    margin: 10px 30px 0px 0px;
    max-width: 50px;
  }
  .categoria i{
    margin-top: -10px;
    padding-top: 0;
  }

</style>


@endif
<script>
  var fechaIda = document.getElementById('fechaIda');
  var fechaVuelta = document.getElementById('fechaVuelta');
  var toggle = document.getElementById('sinFecha');
  toggle.addEventListener('click', function(event) {
    fechaIda.disabled = !fechaIda.disabled;
    fechaVuelta.disabled = !fechaVuelta.disabled;
  });
  function toggleVuelta(elem){
    var vuelta = document.getElementById('fecha_vuelta');
    if(elem.checked){
      vuelta.style.visibility = "";
    }else{
      vuelta.style.visibility = "hidden";
    }
  }
</script>
@endsection
