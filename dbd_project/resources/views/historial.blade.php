@extends('layouts.app')
@section('content')
<div class="container">
  <div class="header"> Historial de compras</div>
  <div>
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
</div>
@stop
