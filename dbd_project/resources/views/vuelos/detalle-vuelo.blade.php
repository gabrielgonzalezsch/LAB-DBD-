@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<h1>Detalles del vuelo: {{$vuelo->nombre_avion}}</h1>
  <ul>
    <li><h3> Aerolinea: {{$vuelo->aerolinea}} </h3></li>
    <li><h3> Viaje: {{$vuelo->aeropuerto_origen}} >>>>> {{$vuelo->aeropuerto_destino}} </h3></li>
    <li><h3> Salida: {{$vuelo->fecha_salida}}, {{$vuelo->hora_salida}}</h3></li>
    <li><h3> Llegada: {{$vuelo->fecha_llegada}}, {{$vuelo->hora_llegada}}</h3></li>
    <li><h3>Tiempo de viaje: {{$horas}}></h3></li>
    <li><h3>Valor turista: {{$vuelo->valor_turista}}</h3></li>
    <li><h3>Valor ejecutivo: {{$vuelo->valor_ejecutivo}}</h3></li>
    <li><h3>Valor primera clase: {{$vuelo->valor_primera_clase}}</h3></li>
  </ul>
  <div class="float-left container">
    <div class="row">
      <div class="form-group col-2">
        <label class="form-input">Ingresa numero de pasajes turista</label>
        <input id="num_turista" type="number" min="0" max="{{$vuelo->cap_turista}}" class="form-control" value=0>
      </div>
      <div class="form-group col-2">
        <label class="form-input">Ingresa numero pasajes ejecutivo</label>
        <input id="num_ejecutivo" type="number" min="0" max="{{$vuelo->cap_ejecutivo}}" class="form-control" value=0>
      </div>
      <div class="form-group col-2">
        <label class="form-input">Ingresa numero pasajes primera clase</label>
        <input id="num_pc" type="number" min="0" max="{{$vuelo->cap_primera_clase}}" class="form-control" value=0>
      </div>
    </div>
  </div>
<div class="ui left action input row">
  <button onclick="addCarrito({{$vuelo->id_vuelo}})" class="ui teal labeled icon button">
  <i class="cart icon"></i>
    Al carrito
  </button>
  <input type="text" value="0" readonly>
  <a href="/" class="button" role="button"> Volver </a>
</div>
<style>
  .col-2{
    padding: 10px !important;
    margin: 0 !important;
  }
</style>
<script>
  function addCarrito(id){
    var num_turista = document.getElementById('num_turista').value;
    var num_ejecutivo = document.getElementById('num_ejecutivo').value;
    var num_pc = document.getElementById('num_pc').value;
    addVueloAlCarrito(id, num_turista, num_ejecutivo, num_pc);
  }
</script>
@endsection
