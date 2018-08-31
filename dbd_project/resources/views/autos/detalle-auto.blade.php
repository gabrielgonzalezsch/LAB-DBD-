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
    <div class="ui segment">
    <ul>
      <li><h3>Pais: {{$auto->pais_arriendo}} </h3></li>
      <li><h3>Ciudad: {{$auto->ciudad_arriendo}} </h3></li>
      <li><h3>Calle: {{$auto->calle_arriendo}} </h3></li>
    </ul>
    </div>
    <div class="ui horizontal divider"> Proceso de compra </div>
    <div class"ui segment">
      <div class="form-group">
        <label>Ingresa numero de dias para el arriendo</label>
        <input id="num_dias" class="form-control" style="width: 10%; margin-left: 10px;" type="number" min=1 value="1">
      </div>
      <a href="/autos" class="ui button" role="button"> Volver a Autos </a>
      <button onclick="addCarrito({{$auto->id_auto}})" class="ui teal labeled icon button">
      <i class="cart icon"></i>
        Al carrito
      </button>
      <label id="total" type="text" class="ui big blue tag label" readonly>$ {{$auto->precio_por_dia}} CLP</label>
    </div>
    @if(Auth::check())
    @if(Auth::user()->esAdmin())
    <div class="ui divider"></div>
    <div class="ui segment">
      <div class="ui header">
        Panel de administrador
      </div>
      <a role="button" class="btn btn-primary" href="{{$auto->id_auto}}/edit"> Editar </a>
      <a role="button" class="btn btn-danger" onclick="return promptDelete()" href=""> Borrar </a>
    </div>
    @endif
    @endif
</div>
</div>
<style>
  .ui.segment li{
    padding: 5px;
    margin-left: 10px;
  }
</style>
<script>
  function promptDelete(){
    var confirmacion = confirm('Esta seguro de eliminar de la base de datos?');
    if(confirmacion){
      window.location = "/autos/{{$auto->id_auto}}/destroy";
    }else{
      alert("Entendido");
    }
    return false;
  }
  $('#num_dias').change(function(){
    var value = $('#num_dias').val() * {{$auto->precio_por_dia}};
    $('#total').html('$ '+value+' CLP');
  });

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
