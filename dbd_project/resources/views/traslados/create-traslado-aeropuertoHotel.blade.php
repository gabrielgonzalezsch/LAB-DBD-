@extends('layouts.app')
@section('content')

<div class="loginTable">
  <div class="title-logo">
    <h1>Traslado: Aeropuerto -> Hotel</h1>   <!-- NOMBRE CATEGORIA -->
  </div>

<br>

  <style>
    input{
      display: inline-flex;
      margin-left: 20px;
      width: 350px;
      height: 30px;
    }

  </style>


<!--<form method="GET" action= "/traslados/calculoTraslado" >-->
  <div class="row">
     <div class="col-md-6">
       <h5>País del Traslado:</h5>
        <select name="pais" onchange="getCiudades()" id="pais" class="form-control">
                <option value="">Elegir País</option>
              
                  @foreach($paises as $pais)

                   <option value="{{$pais['pais']}}">{{$pais['pais']}}</option>

                  @endforeach
            
              
        </select>
      </div>

     <div class="col-md-6">
       <h5>Ciudad del Traslado: </h5>

       <select name="ciudad" onchange="getAeropuertos()" id="ciudad" class="form-control">
                <option value="">Elegir Ciudad</option>
                              
      </select>
     </div>
 </div>

<br><br><br><br>



<div class="row">
     <div class="col-md-6">
       <h5>Aeropuerto Origen (A):</h5>
        
        <select name="aeropuerto" onchange="getHoteles()" id="aeropuerto" class="form-control">
                <option value="0">Elegir Aeropuerto</option>                                        
        </select>
      </div>

     <div class="col-md-6">
       <h5>Hotel Destino (B): </h5>

       <select name="hotel" id="hotel" onchange="" class="form-control">
                <option value="0">Elegir Hotel</option>   
        </select>
     </div>
 </div>


<br><br>


<div class="row">
    <div class="col-md-2">
         <h5>Cantidad de Personas: </h5>

         <select name="cantidad" onchange="getChoferes()" id="cantidad" class="form-control">
                  <option value="0">Elegir Cantidad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
            
          </select>
  

    </div>

    <div name="fecha" id="fecha" class="col-md-2">
          <h5>Fecha del Traslado: </h5>
          {{Form::date('fecha', '', ['id' => 'fecha', 'class' => 'form-control promt'])}}
    </div>
 
  <div class="col-md-2">

  <h5>Hora del Traslado: </h5>       
    <select name="horas" id="horas" class="form-control">


                  <option value="99">Elegir Hora</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
          </select>
  </div>


   <div class="col-md-2">
   <h5>.</h5>   
    <select name="minutos" id="minutos" class="form-control">
                  <option value="99">Elegir Minutos</option>
                  <option value="0">00</option>
                  <option value="15">15</option>
                  <option value="30">30</option>
                  <option value="45">45</option>
                  
          </select>
  </div>

</div>

<br><br>

<div class="row" >
  
<hr style="border:15px; border-color:red;">

</div>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Maps</title>

  <style>
    #map-canvas{

      width: 500px;
      height: 500px;
    }
  </style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD14L_-WOrBrnn24-S-_ilj5yauLu1RZtI&libraries=places"></script>
</head>
<body>

<br><br>
<div class="row">
  <div class="col-md-4">
  <h6><input  onclick="obtener_origen_aeropuerto()" class="btn btn-primary btn-lg" id="get" name="obtener_direccion" value="Click Para Ver Ruta"></h6>
  </div>

  <div class="col-md-2" style="background-color:#22c4b8; color:white;"><h2>Distancia Km.</h2></div>
  <div class="col-md-5" "><h2 style="background-color:#22c4b8; color:white;" >Lista Choferes</h2></div>
  
  

</div>


<div class="row">
  <div class="col-md-4" id="map-canvas" style="width: 500px; height: 500px;"></div>

  <br><br>   <br><br>

  <div class="col-md-2">


  <h3 style="color:#cd2020;"name="distancia" id="distancia" ></h3>



  </div>
  

  <div class="col-md-5">

    <table bgcolor="#22c4b8" id="tabla_choferes" name="tabla_choferes" class="display" style="width:100%; color:white;" border="4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tarifa por Km.</th>
                <th>Valorizacion</th>
            </tr>
        </thead>
        <tbody>
                     
       </tbody>
    </table>


      <br><br>   <br><br>

    <select name="chofer" onchange="getDinero()" id="chofer" class="form-control">
                  <option value="">Elegir Chofer</option>
                  
                  
    </select>

     <br><br>   <br><br>

    <div class="ui left action input row">
      <button onclick="addCarrito({})" class="ui teal labeled icon button">
      <i class="cart icon"></i>
        Al carrito
      </button>
      <input type="text" value="0" name="carrito" id="carrito">
    </div>
    <style>
      .col-2{
        padding: 10px !important;
        margin: 0 !important;
      }
    </style>


    
      
  </div>





</div>



</body>

</html>

<br><br><br><br>

</div>


  <div class="row">
    <div class="col-md-4">
        <a href="/" class="btn btn-danger" role="button"> Volver </a>
    </div>
    <div class="col-md-4"></div>
    
  </div>


<!--</form>-->

<script src="/js/traslados/create-traslado-aeropuertoHotel.js"></script>
<script src="/js/traslados/api-traslados.js"></script>
<script src="{{ asset('js/carrito.js') }}"></script>





@endsection




  


