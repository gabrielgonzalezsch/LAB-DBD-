@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<div class="ui fluid container">
<div class="ui segment column ">
  <h1 class="ui header">Detalles del auto:
  <span id="auto">{{$auto->modelo_auto}}</span></h1>
    <ul>
      <li><h3>Precio por dia: {{$auto->precio_por_dia}} </h3></li>
      <li><h3>Compañía: {{$auto->compañia}} </h3></li>
      <li><h4>Descripcion del auto: {{$auto->descripcion_auto}}</h4></li>
      <li><h4>N° Patente {{$auto->patente}}</h4></li>
    </ul>
    <div class="ui horizontal divider"> Detalles del arriendo </div>
    <ul>
      <li><h3>Pais: {{$auto->pais_arriendo}} </h3></li>
      <li><h3>Ciudad: {{$auto->ciudad_arriendo}} </h3></li>
      <li><h3>Calle: {{$auto->calle_arriendo}} </h3></li>
    </ul>
    <div class="ui left action input">
      <label class="form-input">Ingresa numero de dias para el arriendo</label>
      <input id="num_dias" class="form-input" style="width: 10%; margin-left: 10px;" type="number" value="1">
      <button onclick="addCarrito({{$auto->id_auto}})" class="ui teal labeled icon button">
      <i class="cart icon"></i>
        Al carrito
      </button>
      <input type="text" value="$ {{$auto->precio_por_dia}} CLP" readonly>
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
  function addCarrito(id_auto){
    var id = id_auto;
    var numDiasElem = document.getElementById("num_dias");
    var nombre = document.getElementById("auto").innerHTML;
    var num_dias = numDiasElem.value;
    if(num_dias <= 0){
      numDiasElem.style.border = '1px solid red';
    }else{
       numDiasElem.style.border = '1px solid teal';
       addAutoAlCarrito(id, nombre, num_dias);
    }
  }
</script>
@endsection
