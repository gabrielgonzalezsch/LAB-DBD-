@extends('layouts.app')
@section('content')
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
      <div class="form-group">
       <label for="example-number-input" class="form-label">Ingresa numero de dias</label>
          <input style="width: 10%; margin-left: 10px;"class="form-control" type="number" value="1" id="example-number-input">
      </div>
      <div class="ui left action input">
        <button onclick="addCarrito({{$habitacion->id_habitacion}}, '{{$hotel->nombre_hotel}}', {{$habitacion->precio_por_noche}})" class="ui teal labeled icon button">
          <i class="cart icon"></i>
          Al carrito
        </button>
        <input type="text" value="{{$habitacion->precio_por_noche}}">
      </div>
  @endforeach
  </ul>
  </div>
  @if(Auth::check())
  @if(Auth::user()->esAdmin())
  <a href="/hoteles/{{$hotel->id_hotel}}/create"> Agregar habitaciones (solo admin)</a>
  @endif
  @endif
  <script>
        function addCarrito(id_hab, hotel, precio){
          var id = id_hab;
          var precio = precio//document.getElementById("precio").innerHTML;
          var nombre = hotel;//document.getElementById("nombre-curso").innerHTML;
          var cantidad = 1;//document.getElementById("cantidad").value;
          // if(parseInt(cantidad) > 0){
          //   document.getElementById("cantidadError").style.display = 'none';
          agregarAlCarrito(id, nombre ,"Habitación", cantidad);
          // }else{
          //   document.getElementById("cantidadError").style.display = 'inline-block';
          // }
        }
        function agregarAlCarrito(id_item, nombre, categoria, cantidad){
              $.ajax({
                dataType: "json",
                url : "../../carrito/agregar",
                method : "POST",
                data: {id: id_item, nombre: nombre, categoria: categoria, cantidad: cantidad},
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                  alert("Se ha agregado "+nombre+" al carrito de compras!");
                },
                error: function (data, textStatus, errorThrown) {
                  console.log(data);
                }
              });
        }
</script>
@endsection
