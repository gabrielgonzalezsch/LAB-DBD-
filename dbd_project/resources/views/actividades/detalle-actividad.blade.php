@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<div class="ui fluid container">
<div class="ui segment column ">
  <h1 class="ui header">Detalles de la actividad:
  <span id="actividad">{{$actividad->nombre_actividad}}</span></h1>
  <div class="content">

          <div style="padding: 5px; width: 100%;" class="ui huge orange ribbon label">
            Precios desde: {{$actividad->valor_entrada}}
          </div>
          <div class="ui star rating" data-rating="3"></div>
          <div class="ui horizontal divider header"><h1>{{$actividad->nombre_actividad}}</div></h1>
          <div class="image">
            <center><img src="/images/{{$actividad->nombre_actividad}}{{$array[rand(0,3)]}}.jpg"  alt="Card image cap" style="width: 20%"></center>
          </div>
        </div>
    <ul>
      <dl><h4>  Valor de la entrada: {{$actividad->valor_entrada}} </h4></dl>
      <dl><h4>  Cupos disponibles: {{$actividad->cupos}}</h4></dl>
      <dl><h4>  Descripcion de la actividad: {{$actividad->descripcion_actividad}}</h4></dl>
      
    </ul>
    <div class="ui horizontal divider"><h5> Detalles de ubicación </h5></div>
    <ul>
      <dl><h4>  País: {{$actividad->pais}} </h4></dl>
      <dl><h4>  Ciudad: {{$actividad->ciudad}} </h4></dl>
      <dl><h4>  Dirección: {{$actividad->calle}} </h4></dl>
    </ul>
    <div class= "ui horizontal divider"><h5> Proceso de compra </h5></div>
    <div class="busqueda-row">

      <label class="form-input"><h4>Ingrese el número de entradas</h4></label>
      <input id="num_entradas" class="form-input" style="width: 10%; margin-left: 10px;" type="number" value="1" >
      <button onclick="addCarrito({{$actividad->id_actividad}})" class="ui teal labeled icon button">
      <i class="cart icon"></i>
        Agregar al carrito
      </button>
      <a href="/carrito" class="btn btn-primary">Checkout</a>
      
    
    
    </div>
    <center>
    <a href="/actividades" class="btn btn-info" role="button"> Volver a actividades </a>
  </center>
  
</div>
</div>
<style>
  .ui.segment{
    padding: 10px;
    margin: 5px;
  }
  .ui.fluid.container{
    background-color: #e9ecef;
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
