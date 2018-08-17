@extends('layouts.app')
@section('content')
  <script src="{{ asset('js/carrito.js') }}"></script>
  <div>
    <h1>Detalles del hotel: {{$hotel->nombre_hotel}}</h1>
    <ul>
      <li><h4>Insertar fotos o algo asi, tambien agregar despues comentarios y num valoraciones</h4></li>
      <li><h4>Valoración: {{$hotel->valoracion}}</h4></li>
    </ul>
  </div>
  <div>
    <a href="/hoteles" class="button" role="button"> Volver a hoteles</a>
  </div>
  <div>
  <h2> Mostrando habitaciones </h2>
  <ul>
  @foreach($hotel->habitaciones as $habitacion)
      <li>
        <ul>
          <li><h3>{{$habitacion->num_habitacion}}</h3></li>
          <li><h6>Valoración: {{$habitacion->valoracion}}</li>
          <li><h6>Numero de valoraciones: {{$habitacion->num_valoraciones}}</small></li>
          <li><h4>Precio por noche: {{$habitacion->precio_por_noche}}</li></h4>
          <li><h4>Descripción: {{$habitacion->descripcion}}</h4></li>
          <li><h5>Número de camas dobles {{$habitacion->num_camas_dobles}}</h5></li>
          <li><h5>Número de camas simples {{$habitacion->num_camas_simples}}</h5></li>
          <li><h5>Tamaño de la habitación {{$habitacion->room_size}} m^2</h5></li>
          <li><h6>Incluye servicio: {{$habitacion->incluye_servicio}}</small></li>
          <li><h6>Incluye desayuno: {{$habitacion->incluye_desayuno}}</small></li>
          <li><h6>Incluye aire acondicionado: {{$habitacion->incluye_aire_acondicionado}}</small></li>
        </ul>
      </li>
      @if(Auth::check())
      @if(Auth::user()->esAdmin())
        <a href="/habitaciones/{{$habitacion->id_habitacion}}/edit"> Editar habitacion</a>
      @endif
      @endif
      <div class="ui left action input">
        <label class="form-input">Ingresa numero de dias</label>
        <input class="form-input" style="width: 10%; margin-left: 10px;" type="number" value="1">
        <button onclick="addCarrito(this, {{$habitacion->id_habitacion}}, '{{$hotel->nombre_hotel}}')" class="ui teal labeled icon button">
        <i class="cart icon"></i>
          Al carrito
        </button>
        <input type="text" value="$ {{$habitacion->precio_por_noche}} CLP" readonly>
      </div>
  @endforeach
  </ul>
  </div>
  @if(Auth::check())
  @if(Auth::user()->esAdmin())
  <a href="/hoteles/{{$hotel->id_hotel}}/edit"> Editar hotel</a>
  <a href="/hoteles/{{$hotel->id_hotel}}/create"> Agregar habitaciones (solo admin)</a>
  @endif
  @endif
  <script>
    function addCarrito(elem, id_hab, hotel){
      var id = id_hab;
      var nombre = hotel;//document.getElementById("nombre-curso").innerHTML;
      var elemDias = elem.previousElementSibling;
      var num_dias = elemDias.value;
      if(num_dias < 0){
        elemDias.style.border = '1px solid red';
      }else{
         elemDias.style.border = '1px solid teal';
         addHabitacionAlCarrito(id, nombre, num_dias);
      }
    }
</script>
@endsection
