@extends('layouts.app')
@section('content')
<div class="ui container">
  <div class="ui segment">
  <div class="ui header"> Historial de compras</div>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Id compra</th>
        <th>Fecha compra</th>
        <th>Monto</th>
        <th>Numero de cuenta</th>
      </tr>
    </thead>
    <tbody>
      @foreach($transacciones as $transaccion)
      <tr>
        <td>{{$transaccion->id_transaccion}}</td>
        <td>{{$transaccion->hora_compra}}</td>
        <td>{{$transaccion->monto}}</td>
        <td>{{$transaccion->numero_cuenta_compra}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
 </div>
  <div class="ui segment">
    <div class="ui header">Vuelos reservados</div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Id compra</th>
          <th>Nombre avión</th>
          <th>Aerolínea</th>
          <th>Origen</th>
          <th>Destino</th>
          <th>Hora reserva</th>
          <th>Numero de asiento</th>
          <th>Tipo de asiento</th>
        </tr>
      </thead>
      <tbody>
        @foreach($vuelos_reservados as $vuelo)
        <tr>
          <td>{{$vuelo->id_transaccion}}</td>
          <td>{{$vuelo->nombre_avion}}</td>
          <td>{{$vuelo->nombre_aerolinea}}</td>
          <td>{{$vuelo->aeropuerto_origen}}</td>
          <td>{{$vuelo->aeropuerto_destino}}</td>
          <td>{{$vuelo->hora_compra}}</td>
          <td>{{$vuelo->num_asiento}}</td>
          <td>{{$vuelo->tipo_asiento}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="ui segment">
    <div class="ui header">Hoteles reservados</div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Id compra</th>
          <th>Nombre del hotel</th>
          <th>País</th>
          <th>Ciudad</th>
          <th>Dirección</th>
          <th>Número de habitacion</th>
          <th>Hora de compra</th>
          <th>Inicio reserva</th>
          <th>Fin reserva</th>
          <th>Monto</th>
        </tr>
      </thead>
      <tbody>
        @foreach($habitaciones_reservadas as $habitacion)
        <tr>
          <td>{{$habitacion->id_transaccion}}</td>
          <td>{{$habitacion->nombre_hotel}}</td>
          <td>{{$habitacion->pais}}</td>
          <td>{{$habitacion->ciudad}}</td>
          <td>{{$habitacion->direccion}}</td>
          <td>{{$habitacion->num_habitacion}}</td>
          <td>{{$habitacion->hora_reserva}}</td>
          <td>{{$habitacion->inicio_reserva}}</td>
          <td>{{$habitacion->fin_reserva}}</td>
          <td>{{$habitacion->monto}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop