@extends('layouts.app')
@section('content')
  <div class="loginTable">
    <div class="title-logo">
      <h1>Insertar actividad</h1>
    </div>
    <style>
      input{
        display: inline-flex;
        margin-left: 20px;
        width: 350px;
        height: 30px;
      }
    </style>
    <form action="/actividades/store" method="post">
        <div class="form-control">
              {{ csrf_field()}}
               <div class="form-group">
                 <h6>Nombre de la actividad: </h6>
                 <h6><input type="text" name="nombre_actividad" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Descripcion: </h6>
                 <h6><input type="text" name="descripcion_actividad" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Pais: </h6>
                 <h6><input type="text" name="pais" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Ciudad: </h6>
                 <h6><input type="text" name="ciudad" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Calle: </h6>
                 <h6><input type="text" name="calle" value=""></h6>
               </div>
               <div class="form-group">
                 <h6>Fecha inicio: </h6><h6><input type="date" name="fecha_inicio" value="" placeholder="Formato: yy-mm-dd H:m ..."></h6>
                  <h6>Fecha fin: </h6><h6><input type="date" name="fecha_fin" value="" placeholder="Formato: dd/mm/yy H:m ..."></h6>
               </div>
               <div class="form-group">
                   <h6>Valor entrada: </h6> <h6><input type="text" name="valor_entrada" value=""></h6>
               </div>
              <div class="form-group">
                  <h6>Cupos: </h6><h6><input type="text" name="cupos" value=""></h6>
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
