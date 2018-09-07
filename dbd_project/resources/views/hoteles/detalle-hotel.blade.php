@extends('layouts.app')
@section('content')
  <script src="{{ asset('js/carrito.js') }}"></script>
  <div>
    <h1>Detalles del hotel: {{$hotel->nombre_hotel}}</h1>
    <ul>
      <li><h3>Insertar fotos o algo asi, tambien agregar despues comentarios y num valoraciones</h3></li>
      <li><h3>Valoración: {{$hotel->valoracion}}</h3></li>
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
        @if($habitacion->ya_reservado == false)
        <ul>
          <li><h3>{{$habitacion->num_habitacion}}</h3></li>
          <li><h3>Valoración: {{$habitacion->valoracion}}</li>
          <li><h3>Numero de valoraciones: {{$habitacion->num_valoraciones}}</small></li>
          <li><h3>Precio por noche: {{$habitacion->precio_por_noche}}</li></h3>
          <li><h3>Descripción: {{$habitacion->descripcion}}</h3></li>
          <li><h3>Número de camas dobles {{$habitacion->num_camas_dobles}}</h3></li>
          <li><h3>Número de camas simples {{$habitacion->num_camas_simples}}</h3></li>
          <li><h3>Tamaño de la habitación {{$habitacion->room_size}} m^2</h3></li>
          <li><h3>Incluye servicio: {{$habitacion->incluye_servicio}}</small></li>
          <li><h3>Incluye desayuno: {{$habitacion->incluye_desayuno}}</small></li>
          <li><h3>Incluye aire acondicionado: {{$habitacion->incluye_aire_acondicionado}}</small></li>
        </ul>
      </li>
      @if(Auth::check())
      @if(Auth::user()->esAdmin())
        <a href="/habitaciones/{{$habitacion->id_habitacion}}/edit"> Editar habitacion</a>
      @endif
      @endif
      <div class="ui left action input">
        <label class="form-input">Selecciona las fechas de arriendo</label>
        <div class="form-row">
        <div class="form-group col-sm-12 col-md-6">
          <label for="fecha_inicio" class="text-info">Fecha inicio arriendo:</label>
          <input id="inicio{{$habitacion->id_habitacion}}" type="date" name="fecha_inicio" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-6">
          <label for="fecha_fin" class="text-info">Fecha término arriendo:</label>
          <input id="fin{{$habitacion->id_habitacion}}" type="date" name="fecha_fin" class="form-control">
        </div>
        </div>
        <input class="form-input" style="width: 10%; margin-left: 10px;" type="number" value="1">
        <button onclick="addCarrito(this, {{$habitacion->id_habitacion}}, '{{$hotel->nombre_hotel}}')" class="ui teal labeled icon button">
        <i class="cart icon"></i>
          Al carrito
        </button>
        <input type="text" value="$ {{$habitacion->precio_por_noche}} CLP" readonly>
      </div>
      @endif
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
