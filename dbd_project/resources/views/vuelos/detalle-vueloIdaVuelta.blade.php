@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<h1>Detalles del vuelo:</h1>
<div class="container-fluid">
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
  <div class="container-fluid">
  <div class="row">
    <div class="row">
      <div class="form-group col-4">
        <label class="form-input">Ingresa numero de pasajes turista</label>
        <input id="num_turista" type="number" min="0" max="{{$joint_vuelo['vuelta']['cap_turista']}}" class="form-control" value=0>
      </div>
      <div class="form-group col-4">
        <label class="form-input">Ingresa numero pasajes ejecutivo</label>
        <input id="num_ejecutivo" type="number" min="0" max="{{$joint_vuelo['vuelta']['cap_ejecutivo']}}" class="form-control" value=0>
      </div>
      <div class="form-group col-4">
        <label class="form-input">Ingresa numero pasajes primera clase</label>
        <input id="num_pc" type="number" min="0" max="{{$joint_vuelo['vuelta']['cap_primera_clase']}}" class="form-control" value=0>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="container">
<div class="row">
<div class="ui left action input col-12">
  <button onclick="addCarrito({{$joint_vuelo['ida']['id_vuelo']}},{{$joint_vuelo['vuelta']['id_vuelo']}})" class="ui teal labeled icon button">
  <i class="cart icon"></i>
    Al carrito
  </button>
  <input type="text" value="0" readonly>
  <a href="javascript:history.back()">Volver atrás</a>
</div>
</div>
</div>
<style>
  .col-2{
    padding: 10px !important;
    margin: 0 !important;
  }
</style>
<script>
  function addCarrito(id_ida, id_vuelta){
    var num_turista = document.getElementById('num_turista').value;
    var num_ejecutivo = document.getElementById('num_ejecutivo').value;
    var num_pc = document.getElementById('num_pc').value;
    addJointVueloAlCarrito(id_ida, id_vuelta, num_turista, num_ejecutivo, num_pc);
  }
</script>
@endsection
