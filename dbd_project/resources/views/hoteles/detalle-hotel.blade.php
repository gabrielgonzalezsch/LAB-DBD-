@extends('layouts.app')
@section('content')
  <script src="{{ asset('js/carrito.js') }}"></script>
  <div class="ui fluid container">
<div class="ui segment column ">
  <h1 class="ui header">Detalles del hotel
  <span id="hotel">{{$hotel->nombre_hotel}}</span></h1>
  <div class="content">

          <div style="padding: 5px; width: 100%;" class="ui huge orange ribbon label">
            Precios desde: ${{$hotel->precio_min_habitacion}} por noche
          </div>
          <div class="ui star rating" data-rating="3"></div>
          <div class="ui horizontal divider header"><h1>{{$hotel->nombre_hotel}}</div></h1>
          <div class="image">
            <center><img src="/images/{{$hotel->valoracion}}.jpg"  alt="Card image cap" style="width: 20%"></center>
          </div>
        </div>
    <ul>
      <dl><h4>  Habitaciones disponibles: {{$hotel->habitaciones_disponibles}}</h4></dl>
      <dl><h4>  Valoración hotel: {{$hotel->valoracion}} / 5.0</h4></dl>
      
    </ul>
    <div class="ui horizontal divider"><h5> Detalles de ubicación </h5></div>
    <ul>
      <dl><h4>  País: {{$hotel->pais}} </h4></dl>
      <dl><h4>  Ciudad: {{$hotel->ciudad}} </h4></dl>
      <dl><h4>  Dirección: {{$hotel->direccion}} </h4></dl>
    </ul>
      @if(Auth::check())
      @if(Auth::user()->esAdmin())
      <a href="/hoteles/{{$hotel->id_hotel}}/edit"> Editar hotel</a>
      <a href="/hoteles/{{$hotel->id_hotel}}/create"> Agregar habitaciones </a>
      @endif
      @endif
    <center>
    <a href="/hoteles" class="btn btn-info" role="button"> Volver a Hoteles </a>
  </center>
  
</div>
</div>
<div class="ui fluid container">
  <div class="ui segment column ">
    <h1> Habitaciones disponibles en el hotel</h1>
    <ul>
       @foreach($hotel->habitaciones as $habitacion)
       <div class = "ui fluid container">
        @if($habitacion->ya_reservado == false)
          <ul>
             <div class="ui horizontal divider header"><h2>Habitación {{$habitacion->num_habitacion}}</h2></div>
            <dl><h4> Numero de la habitacion: {{$habitacion->num_habitacion}} </h4></dl>
            <dl><h4> Precio por noche: {{$habitacion->precio_por_noche}} </h4></dl>
            <dl><h4> Valoración: {{$habitacion->valoracion}} </h4></dl>
            <dl><h4> Descripcion: {{$habitacion->descripcion}} </h4></dl>
            <dl><h4> Camas individuales disponibles: {{$habitacion->num_camas_simples}} </h4></dl>
            <dl><h4> Camas dobles disponibles: {{$habitacion->num_camas_dobles}} </h4></dl>
            <div class="ui horizontal divider header"><h3>Servicios disponibles </h3></div>
            @if($habitacion->incluye_servicio == 0)
            <dl><h4> Incluye servicio a la habitación: No </h4></dl>
            @else
            <dl><h4> Incluye servicio a la habitación: Si </h4></dl>
            @endif
            @if($habitacion->incluye_desayuno == 0)
            <dl><h4> Incluye servicio de desayuno: No </h4></dl>
            @else
            <dl><h4> Incluye servicio a la habitación: Si </h4></dl>
            @endif
            @if($habitacion->incluye_aire_acondicionado == 0)
            <dl><h4> Incluye aire acondicionado: No </h4></dl>
            @else
            <dl><h4> Incluye aire acondicionado: Si </h4></dl>
            @endif
            <div class="ui horizontal divider header"><h3>Proceso de compra</h3></div>
          </ul>
           <div class="busqueda_row">
          <label class="form-input"><h2>Selecciona las fechas de arriendo</h2></label>
        <div class="form-row">
        <div class="form-group col-sm-12 col-md-6">
          <label for="fecha_inicio" class="text-info col-md-3">Fecha inicio arriendo:</label>
          <input id="inicio{{$habitacion->id_habitacion}}" type="date" name="fecha_inicio" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-6">
          <label for="fecha_fin" class="text-info">Fecha término arriendo:</label>
          <input id="fin{{$habitacion->id_habitacion}}" type="date" name="fecha_fin" class="form-control">
        </div>
        </div>
        
        <button onclick="addCarrito(this, {{$habitacion->id_habitacion}}, '{{$hotel->nombre_hotel}}')" class="ui teal labeled icon button">
        <i class="cart icon"></i>
          Al carrito
        </button>
  
      </div>
        @endif
        @if(Auth::check())
        @if(Auth::user()->esAdmin())
          <a href="/habitaciones/{{$habitacion->id_habitacion}}/edit"> Editar habitacion</a>
        @endif
        @endif
       </div>
       @endforeach
      </ul>
  </div>
</div>


<script>
    function addCarrito(elem, id_hab, hotel){
      var id = id_hab;
      var nombre = hotel;//document.getElementById("nombre-curso").innerHTML;
      var inicio = document.getElementById('inicio'+id).value;
      var fin = document.getElementById('fin'+id).value;
      var dif = Math.abs(new Date(fin).getTime() - new Date(inicio).getTime());
      var num_dias = Math.ceil(dif / (1000 * 3600 * 24));
      if(num_dias < 0){
        alert('Por favor ingrese fechas válidas');
        return false;
      }else{
        addHabitacionAlCarrito(id, nombre, inicio , fin, num_dias);
      }
    }
</script>
@endsection
