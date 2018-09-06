@extends('layouts.app')
@section('content')
@if(isset($vuelo) && isset($auto))
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Paquete vuelo y auto</h1>
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
  <div class="col-md-6 col-sm-12">
    <div class="ui segment column">
      <h1 class="ui header">Detalles del auto: <span id="auto">{{$auto->modelo_auto}}</span></h1>
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
        <div class="col-6">
          <label>Ingresa fecha de arriendo</label>
          <input id="fecha_inicio" class="form-control" style="margin-left: 10px;" type="date" value="{{date_format($vuelo->hora_llegada, 'Y-m-d')}}">
        </div>
        <div class="col-6">
          <label>Ingresa fecha de devolución</label>
          <input id="fecha_fin" class="form-control" style="margin: auto;" type="date" />
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
    <label id="total" type="text" class="ui big blue tag label" readonly>$ 0 CLP</label>
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
turista.addEventListener('change', updateTotal);
ejecutivo.addEventListener('change', updateTotal);
pc.addEventListener('change', updateTotal);

function updateTotal(){
  var dif = Math.abs(new Date(fin.value).getTime() - new Date(inicio.value).getTime());
  var num_dias = Math.ceil(dif / (1000 * 3600 * 24));
  var precioTotal = {{$auto->precio_por_dia}}*num_dias + turista.value*{{$vuelo->valor_turista}}  + ejecutivo.value*{{$vuelo->valor_ejecutivo}} + pc.value*{{$vuelo->valor_primera_clase}};
  total.innerHTML = '$ '+ precioTotal + ' CLP';
}

function addCarrito(id_vuelo, id_auto){
  var nombre = document.getElementById("auto").innerHTML;
  if(num_dias <= 0){
    document.getElementById('botonComprar').disabled = true;
    document.getElementById('alertFecha').style.display = "block";
  }else{
    document.getElementById('botonComprar').disabled = false;
    document.getElementById('alertFecha').style.display = "none";
    //if(checkDisponible() == true){
     addAutoAlCarrito(id, nombre, inicio, fin, num_dias);
    //}
  }
}
</script>
@endsection
