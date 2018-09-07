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
        <div id="alertFecha" style="display: none;" class="alert alert-warning" role="alert">
          <h4 class="alert-heading">Fechas no válidas</h4>
            Por favor ingrese la fecha de salida y retorno correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form name="busqueda" id="busqueda" action="/vuelos/buscar" method="get">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inicio">Escribe la ciudad de origen...</label>
          <input name="origen" id="origen" class="form-control prompt" type="text" placeholder="Escribe la ciudad de origen..." />
        </div>
        <div class="form-group col-md-3">
          <label for="destino">Escribe la ciudad de destino...</label>
          <input name="destino" id="destino" class="form-control prompt" type="text" placeholder="Escribe la ciudad de destino..." />
        </div>
        <div class="form-group col">
          <div class="form-check">
              <input onclick="toggleVuelta(this)" class="form-check-input" type="checkbox" name="idaVuelta" id="idaVuelta" checked>
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
          <input name="fechaPartida" id="fechaIda" type="date" class="form-control promt"/>
        </div>
        <div id="fecha_vuelta" class="form-group col-md-3">
          <label for="fechaLlegada" class="ui input label"> Elige la fecha de regreso... </label>
          <input name="fechaLlegada" id="fechaVuelta" type="date" class="form-control promt"/>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <submit onclick="check()" form="busqueda" name="enviar" id="buscar" class="btn btn-primary"> Buscar Vuelos</submit>
          <div id="resultados" class="results"></div>
        </div>
      </div>
      </form>
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
          Ver detalles
          </a>
        </div>
      </div>
    @endforeach
    </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$vuelos->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/vuelos" class="btn btn-primary" role="button"> Volver </a>
  @else
    <p>No se encontraron vuelos!</p>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/vuelos" class="btn btn-primary" role="button"> Volver </a>
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
            <a href="/vuelos/{{$joint_vuelo['ida']['id_vuelo']}}/{{$joint_vuelo['vuelta']['id_vuelo']}}" class="ui bottom attached blue button">
            <i class="fas fa-search"></i>
            Ver detalles
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
  var alertFecha = document.getElementById('alertFecha');
  var fechaIda = document.getElementById('fechaIda');
  var fechaVuelta = document.getElementById('fechaVuelta');
  var sinFecha = document.getElementById('sinFecha');
  sinFecha.addEventListener('click', function(event) {
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
  function check(){
    var origen = document.getElementById('origen').value;
    var destino = document.getElementById('destino').value;
    var fechaIda = document.getElementById('fechaIda').value;
    var fechaVuelta = document.getElementById('fechaVuelta').value;
    var buscar = document.getElementById('buscar');
    var sinFecha = document.getElementById('sinFecha').checked;
    var idaVuelta = document.getElementById('idaVuelta').checked;
    if(origen == ''){
      alert('Por favor ingrese un pais de origen');
      buscar.classList.add('disabled');
      return false;
    }
    if(destino == ''){
      alert('Por favor ingrese un país de destino');
      buscar.classList.add('disabled');
      return false;
    }
    if((fechaIda==''||fechaIda==null) && !sinFecha){
    //  buscar.disabled = true;
      alertFecha.style.display = "block";
      //return false;
    }else if((fechaVuelta==''||fechaVuelta==null) && (!sinFecha || idaVuelta)){
      //buscar.disabled = true;
      alertFecha.style.display = "block";
      //return false;
    }else{
      //buscar.disabled = false;
      alertFecha.style.display = "none";
    }
    document.getElementById('busqueda').submit();
    return true;
  }
</script>
@endsection
