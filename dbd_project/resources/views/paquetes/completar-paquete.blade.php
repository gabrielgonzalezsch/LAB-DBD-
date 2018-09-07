@extends('layouts.app')
@section('content')
@if((isset($vuelo) || isset($joint_vuelo)) && isset($auto))
<script src="{{ asset('js/carrito.js') }}"></script>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Paquete vuelo y auto</h1>
    <input id="paquete" type="hidden" value="{{$id_paquete}}" />
    <p class="lead">Vuelo y autos seleccionados, confirme el paquete para agregarlo al carrito!</p>
  </div>
</div>
<div class="ui divider"></div>
<div class="ui segment">
  <div class="ui four top attached steps">
    <div class="step">
      <i class="check icon"></i>
      <div class="content">
        <div class="title"> Buscar un vuelo </div>
        <div class="description"> Elige un vuelo a tu destino </div>
      </div>
    </div>
    <div class="step">
       <i class="check icon"></i>
       <div class="content">
         <div class="title"> Auto </div>
         <div class="description"> Escoje el auto que prefieras arrendar </div>
       </div>
     </div>
    <div class="active step">
      <i class="cart icon"></i>
      <div class="content">
        <div class="title"> Carrito </div>
        <div class="description"> Confirma el paquete y agregarlo al carrito </div>
      </div>
    </div>
    <div class="disabled step">
      <i class="payment icon"></i>
      <div class="content">
        <div class="title"> Realizar la compra </div>
        <div class="description"> Paga el paquete con tus fondos </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  @if(isset($joint_vuelo))
  <input type="hidden" value="{{$joint_vuelo['ida']['id_vuelo']}}" id="jointVueloIda" />
  <input type="hidden" value="{{$joint_vuelo['vuelta']['id_vuelo']}}" id="jointVueloVuelta" />
  <div class="col-md-6 col-sm-12">
    <div class="ui segment column">
      <h1 class="ui header">Detalles del vuelo:</h1>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="ui segment">
            <div class="ui header">Vuelo Ida: {{$joint_vuelo['ida']['aeropuerto_origen']}} >> {{$joint_vuelo['ida']['aeropuerto_destino']}}</div>
            <div class="content">
              <ul>
                <li><h4> Salida: {{$joint_vuelo['ida']['fecha_salida']}}, {{$joint_vuelo['ida']['hora_salida']}}</h4></li>
                <li><h4> Llegada: {{$joint_vuelo['ida']['fecha_llegada']}}, {{$joint_vuelo['ida']['hora_llegada']}}</h4></li>
                <li>Valor turista: {{$joint_vuelo['ida']['valor_turista']}}</li>
                <li>Valor ejecutivo: {{$joint_vuelo['ida']['valor_ejecutivo']}}</li>
                <li>Valor primera clase: {{$joint_vuelo['ida']['valor_primera_clase']}}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="ui segment">
            <div class="ui header">Vuelo Regreso: {{$joint_vuelo['vuelta']['aeropuerto_origen']}} >> {{$joint_vuelo['vuelta']['aeropuerto_destino']}}</div>
            <div class="content">
              <ul>
                <li><h4> Salida: {{$joint_vuelo['vuelta']['fecha_salida']}}, {{$joint_vuelo['vuelta']['hora_salida']}}</h4></li>
                <li><h4> Llegada: {{$joint_vuelo['ida']['fecha_llegada']}}, {{$joint_vuelo['vuelta']['hora_llegada']}}</h4></li>
                <li>Valor turista: {{$joint_vuelo['vuelta']['valor_turista']}}</li>
                <li>Valor ejecutivo: {{$joint_vuelo['vuelta']['valor_ejecutivo']}}</li>
                <li>Valor primera clase: {{$joint_vuelo['vuelta']['valor_primera_clase']}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
        <div class="ui horizontal divider"> Tipos de pasaje </div>
          <div class="row">
            <div class="form-group col-4">
              <label class="form-input">Número de de pasajes turista</label>
              <input id="num_turista" type="number" min="0" max="{{$vuelo->cap_turista}}" class="form-control" value=0>
            </div>
            <div class="form-group col-4">
              <label class="form-input">Número de pasajes ejecutivo</label>
              <input id="num_ejecutivo" type="number" min="0" max="{{$vuelo->cap_ejecutivo}}" class="form-control" value=0>
            </div>
            <div class="form-group col-4">
              <label class="form-input">Número de pasajes primera clase</label>
              <input id="num_pc" type="number" min="0" max="{{$vuelo->cap_primera_clase}}" class="form-control" value=0>
            </div>
        </div>
    </div>
  </div>
  @else
  <div class="col-md-6 col-sm-12">
    <div class="ui segment column">
      <h1 class="ui header">Detalles del vuelo: <span id="vuelo">{{$vuelo->nombre_avion}}</span></h1>
        <ul>
          <li><h3> Aerolinea: {{$vuelo->nombre_aerolinea}} </h3></li>
          <li><h3> Viaje: {{$vuelo->aeropuerto_origen}} >>>>> {{$vuelo->aeropuerto_destino}} </h3></li>
          <li><h4> Salida: {{$vuelo->fecha_salida}}, {{$vuelo->hora_salida}}</h4></li>
          <li><h4> Llegada: {{$vuelo->fecha_llegada}}, {{$vuelo->hora_llegada}}</h4></li>
          <li>Valor turista: {{$vuelo->valor_turista}}</li>
          <li>Valor ejecutivo: {{$vuelo->valor_ejecutivo}}</li>
          <li>Valor primera clase: {{$vuelo->valor_primera_clase}}</li>
        </ul>
        <div class="ui horizontal divider"> Tipos de pasaje </div>
          <div class="row">
            <div class="form-group col-4">
              <label class="form-input">Número de de pasajes turista</label>
              <input id="num_turista" type="number" min="0" max="{{$vuelo->cap_turista}}" class="form-control" value=0>
            </div>
            <div class="form-group col-4">
              <label class="form-input">Número de pasajes ejecutivo</label>
              <input id="num_ejecutivo" type="number" min="0" max="{{$vuelo->cap_ejecutivo}}" class="form-control" value=0>
            </div>
            <div class="form-group col-4">
              <label class="form-input">Número de pasajes primera clase</label>
              <input id="num_pc" type="number" min="0" max="{{$vuelo->cap_primera_clase}}" class="form-control" value=0>
            </div>
        </div>
    </div>
  </div>
  @endif
  <div class="col-md-6 col-sm-12">
    <div class="ui segment column">
      <h1 class="ui header">Detalles del auto: <span id="auto">{{$auto->modelo_auto}}</span></h1>
      <span type="hidden" id="id_auto">{{$auto->id_auto}}</span>
        <ul>
          <li><h3>Precio por dia: {{$auto->precio_por_dia}} </h3></li>
          <li><h3>Compañía: {{$auto->compañia}} </h3></li>
          <li><h4>Descripcion del auto: {{$auto->descripcion_auto}}</h4></li>
          <li><h4>N° Patente {{$auto->patente}}</h4></li>
        </ul>
        <div class="ui horizontal divider"> Detalles del arriendo </div>
        <div class="ui segment">
        <ul>
          <li><h3>Pais: {{$auto->pais_arriendo}} </h3></li>
          <li><h3>Ciudad: {{$auto->ciudad_arriendo}} </h3></li>
          <li><h3>Calle: {{$auto->calle_arriendo}} </h3></li>
        </ul>
        </div>
        <div class="ui horizontal divider">Fechas de arriendo</div>
        <div class="row">
        <div class="col-4">
          <label>Ingresa fecha de arriendo</label>
          <input id="fecha_inicio" class="form-control" style="margin-left: 10px;" type="date" value="{{date_format($vuelo->hora_llegada, 'Y-m-d')}}">
        </div>
        <div class="col-4">
          <label>Ingresa fecha de devolución</label>
          <input id="fecha_fin" class="form-control" style="margin: auto;" type="date" />
        </div>
        <div style="min-height: 30px;" class="col-2">
          <label>Número total de dias</label>
          <label class="form-control" readonly id="num_dias" name="num_dias">0</label>
        </div>
        </div>
        <div class="row">
          <div id="alertFecha" style="display: none;" class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Fechas no válidas</h4>
              Por favor ingrese la fecha de salida y retorno correctamente
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="ui segment">
  <div class="ui header"> Proceso de compra </div>
  <div class"centrado">
    <a href="/paquetes" class="ui button" role="button"> Volver a selección de paquetes </a>
    <button disabled id="botonComprar" onclick="addCarrito({{$vuelo->id_vuelo}}, {{$auto->id_auto}})" class="ui teal labeled icon button">
    <i class="cart icon"></i>
      Al carrito
    </button>
    <label type="text" class="ui big blue tag label" readonly>$ <span id="total"></span> CLP</label>
    </div>
</div>
@endif
<script>
var turista = document.getElementById('num_turista');
var ejecutivo = document.getElementById('num_ejecutivo');
var pc = document.getElementById('num_pc');
var total = document.getElementById('total');
var inicio = document.getElementById('fecha_inicio');
var fin = document.getElementById('fecha_fin');
var fechaAlert = document.getElementById("alertFecha");
turista.addEventListener('change', updateTotal);
ejecutivo.addEventListener('change', updateTotal);
pc.addEventListener('change', updateTotal);
inicio.addEventListener('change', updateTotal);
fin.addEventListener('change', updateTotal);

function updateTotal(){
  var dif = new Date(fin.value).getTime() - new Date(inicio.value).getTime();
  var num_dias = Math.ceil(dif / (1000 * 3600 * 24));
  if(num_dias < 0)
    return false;
  document.getElementById('num_dias').innerHTML = num_dias;
  var precioTotal = {{$auto->precio_por_dia}}*num_dias + turista.value*{{$vuelo->valor_turista}}  + ejecutivo.value*{{$vuelo->valor_ejecutivo}} + pc.value*{{$vuelo->valor_primera_clase}};
  total.innerHTML = precioTotal;
  if(num_dias <= 0){
    document.getElementById('botonComprar').disabled = true;
    fechaAlert.style.display = "block";
  }else{
    document.getElementById('botonComprar').disabled = false;
    fechaAlert.style.display = "none";
  }
}

function addCarrito(id_vuelo, id_auto){
  var auto = document.getElementById("auto").innerHTML;
  var vuelo = document.getElementById("vuelo").innerHTML;
  var total = document.getElementById("total").innerHTML;
  var num_turista = document.getElementById("num_turista").value;
  var num_ejecutivo = document.getElementById("num_ejecutivo").value;
  var num_pc = document.getElementById("num_pc").value;
  var inicio = document.getElementById('fecha_inicio').value;
  var fin = document.getElementById('fecha_fin').value;
  var num_dias = document.getElementById("num_dias").innerHTML;
  var id_paquete = document.getElementById("paquete").value;
  var joint_id_ida = document.getElementById("jointVueloIda");
  var joint_id_vuelta = document.getElementById("jointVueloVuelta");
  if(!joint_id_ida && !joint_id_vuelta){
    addVueloPaqueteAlCarrito(id_vuelo, id_paquete, num_turista, num_ejecutivo, num_pc);
    addAutoPaqueteAlCarrito(id_auto, id_paquete, auto, inicio, fin, num_dias);
  }else{
    addJointVueloPaqueteAlCarrito(joint_id_ida, joint_id_vuelta, id_paquete, num_turista, num_ejecutivo, num_pc);
    addAutoPaqueteAlCarrito(id_auto, id_paquete, auto, inicio, fin, num_dias);
  }
}
</script>
@endsection
