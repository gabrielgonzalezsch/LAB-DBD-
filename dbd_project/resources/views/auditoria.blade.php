@extends('layouts.app')
@section('content')
<div class="ui fluid container">
  <div class="ui segment">
  <div class="ui header"> Auditoria </div>
  <table class="ui fixed stackable celled table">
    <thead class="thead-dark">
      <tr>
        <th>Id audit</th>
        <th>Id usuario</th>
        <th>Tipo de acción</th>
        <th>Tabla afectada</th>
        <th>Id tabla</th>
        <th>Valores antiguos</th>
        <th>Valores nuevos</th>
        <th>URL source</th>
        <th>IP source</th>
        <th>Fecha realizado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($auditoria as $audit)
      <tr>
        <td>{{$audit->id}}</td>
        <td>{{$audit->usuario_id}}</td>
        <td>{{$audit->event}}</td>
        <td>{{$audit->auditable_type}}</td>
        <td>{{$audit->auditable_id}}</td>
        <td>{{$audit->old_values}}</td>
        <td>{{$audit->new_values}}</td>
        <td>{{$audit->url}}</td>
        <td>{{$audit->ip_address}}</td>
        <td>{{$audit->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
   </div>
</div>
@stop
