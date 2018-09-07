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
 <div class="ui header"> Paquetes comprados</div>
 <table class="table">
   <thead class="thead-dark">
     <tr>
       <th>Id compra</th>
       <th>Id vuelo</th>
       <th>Id auto</th>
       <th>Id habitación</th>
       <th>Fecha compra</th>
       <th>Tipo paquete</th>
       <th>Monto</th>
     </tr>
   </thead>
   <tbody>
     @foreach($paquetes_comprados as $paquete)
     <tr>
       <td>{{$paquete->id_transaccion}}</td>
       @if($paquete->tipo_paquete == 'Vuelo + Auto')
       <td>{{$paquete->id_vuelo}}</td>
       <td>{{$paquete->id_auto}}</td>
       <td> - </td>
       @endif
       <td>{{$paquete->hora_compra}}</td>
       <td>{{$paquete->tipo_paquete}}</td>
       <td>{{$paquete->monto}}</td>
     </tr>
     @endforeach
   </tbody>
 </table>
</div>
<div class="ui segment">
<div class="ui header"> Traslados arrendados</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Id compra</th>
      <th>Id chofer</th>
      <th>Fecha compra</th>
      <th>Fecha traslado</th>
      <th>Formato traslado</th>
      <th>Número personas</th>
      <th>Monto</th>
    </tr>
  </thead>
  <tbody>
    @foreach($traslados_comprados as $traslado)
    <tr>
      <td>{{$traslado->id_transaccion}}</td>
      <td>{{$traslado->id_chofer}}</td>
      <td>{{$traslado->hora_compra}}</td>
      <td>{{$traslado->hora_traslado}}</td>
      <td>{{$traslado->formato_traslado}}</td>
      <td>{{$traslado->num_personas}}</td>
      <td>{{$traslado->monto}}</td>
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
  <div class="ui segment">
    <div class="ui header">Entradas compradas de actividades </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Id compra</th>
          <th>Nombre de la actividad</th>
          <th>País</th>
          <th>Ciudad</th>
          <th>Dirección</th>
          <th>Hora de compra</th>
          <th>Tipo entrada</th>
          <th>Número de entradas</th>
          <th>Monto</th>
        </tr>
      </thead>
      <tbody>
        @foreach($actividades_compradas as $actividad)
        <tr>
          <td>{{$actividad->id_transaccion}}</td>
          <td>{{$actividad->nombre_actividad}}</td>
          <td>{{$actividad->pais}}</td>
          <td>{{$actividad->ciudad}}</td>
          <td>{{$actividad->calle}}</td>
          <td>{{$actividad->hora_compra}}</td>
          <td>{{$actividad->tipo_entrada}}</td>
          <td>{{$actividad->num_entradas}}</td>
          <td>{{$actividad->monto}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="ui segment">
    <div class="ui header">Autos arrendados</div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Id compra</th>
          <th>Modelo</th>
          <th>Patente</th>
          <th>País</th>
          <th>Ciudad</th>
          <th>Dirección Arriendo</th>
          <th>Hora de compra</th>
          <th>Inicio reserva</th>
          <th>Fin reserva</th>
          <th>Monto</th>
        </tr>
      </thead>
      <tbody>
        @foreach($autos_arrendados as $auto)
        <tr>
          <td>{{$auto->id_transaccion}}</td>
          <td>{{$auto->modelo_auto}}</td>
          <td>{{$auto->patente}}</td>
          <td>{{$auto->pais_arriendo}}</td>
          <td>{{$auto->ciudad_arriendo}}</td>
          <td>{{$auto->calle_arriendo}}</td>
          <td>{{$auto->hora_reserva}}</td>
          <td>{{$auto->inicio_reserva}}</td>
          <td>{{$auto->fin_reserva}}</td>
          <td>{{$auto->monto}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
