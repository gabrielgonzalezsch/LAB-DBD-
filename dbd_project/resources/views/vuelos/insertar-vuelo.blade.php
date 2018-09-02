@extends('layouts.app')
@section('content')
  <div class="loginTable">
    <div class="title-logo">
      <h1>Insertar vuelo</h1>
    </div>
    <style>
      input{
        display: inline-flex;
        margin-left: 20px;
        width: 350px;
        height: 30px;
      }
    </style>
    <form action="/vuelos/store" method="post">
        <div class="form-control">
              {{ csrf_field()}}
               <div class="form-group">
                 <h6>Nombre del avión: </h6>
                 <h6><input type="text" name="n_avion" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Aerolinea: </h6>
                 <h6><input type="text" name="aerolinea" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Aeropuerto origen: </h6>
                 <h6><input type="text" name="a_origen" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Aeropuerto destino: </h6>
                 <h6><input type="text" name="a_destino" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Hora salida: </h6><h6><input type="date" name="hora_salida" value="" placeholder="Formato: yy-mm-dd H:m ..."></h6>
                  <h6>Hora llegada: </h6><h6><input type="date" name="hora_llegada" value="" placeholder="Formato: dd/mm/yy H:m ..."></h6>
               </div>
               <div class="form-group">
                   <h6>Capacidad equipaje: </h6> <h6><input type="text" name="c_equipaje" value=""></h6>
                   <h6>Maletas por persona: </h6> <h6><input type="text" name="maletas" value=""></h6>
               </div>
               <div class="form-group">
                    <h6>Capacidad turistas: </h6> <h6><input type="text" name="c_turista" value=""></h6>
                    <h6>Capacidad ejecutivo: </h6> <h6><input type="text" name="c_ejecutivo" value=""></h6>
                    <h6>Capacidad primera clase: </h6> <h6><input type="text" name="c_primera_clase" value=""></h6>
               </div>
               <div class="form-group">
                    <h6>Precio turistas: </h6> <h6><input type="text" name="p_turista" value=""></h6>
                    <h6>Precio ejecutivo: </h6> <h6><input type="text" name="p_ejecutivo" value=""></h6>
                    <h6>Precio primera clase: </h6> <h6><input type="text" name="p_primera_clase" value=""></h6>
               </div>
               <div class="form-group">
                  <h6>Descuento: </h6><h6><input type="text" name="descuento" value=""></h6>
               </div>
                 <h6><input class="btn btn-primary"type="submit" name="submit" value="Ingresar"></h6>
                 <a href="/" class="btn btn-danger" role="button"> Volver </a>
        </table>
    </form>
  </div>
@endsection
