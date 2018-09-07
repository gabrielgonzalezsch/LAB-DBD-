@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<div class="ui fluid container">
<div class="ui segment column ">
  <h1 class="ui header">Detalles de la actividad:
  <span id="actividad">{{$actividad->nombre_actividad}}</span></h1>
    <ul>
      <li><h3>Valor de la entrada: {{$actividad->valor_entrada}} </h3></li>
      <li><h4>Descripcion de la actividad: {{$actividad->descripcion_actividad}}</h4></li>
      <li><h4>Cupos: {{$actividad->cupos}}</h4></li>
    </ul>
    <div class="ui horizontal divider"> Ubicación </div>
    <ul>
      <li><h3>País: {{$actividad->pais}} </h3></li>
      <li><h3>Ciudad: {{$actividad->ciudad}} </h3></li>
      <li><h3>Dirección: {{$actividad->calle}} </h3></li>
    </ul>
    <div class="ui left action input">
      <label class="form-input">Ingresa numero de entradas</label>
      <input id="num_entradas" class="form-input" style="width: 10%; margin-left: 10px;" type="number" value="1">
      <button onclick="addCarrito({{$actividad->id_actividad}})" class="ui teal labeled icon button">
      <i class="cart icon"></i>
        Al carrito
      </button>
      <input type="text" value="$ {{$actividad->valor_entrada}} CLP" readonly>
    </div>
    <a href="/" class="btn btn-info" role="button"> Volver </a>
</div>
</div>
<style>
  .ui.segment{
    padding: 10px;
    margin: 5px;
  }
</style>
<script>
  function addCarrito(id_actividad){
    var id = id_actividad;
    var numEntradas = document.getElementById("num_entradas");
    var nombre = document.getElementById("actividad").innerHTML;
    var num_entradas = numEntradas.value;
    if(num_entradas <= 0){
      numEntradas.style.border = '1px solid red';
    }else{
       numEntradas.style.border = '1px solid teal';
       addActividadAlCarrito(id, nombre, num_entradas);
    }
  }
</script>
@endsection
