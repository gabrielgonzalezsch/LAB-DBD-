@extends('layouts.app')
@section('content')
<<<<<<< Updated upstream


<script></script>
=======
>>>>>>> Stashed changes
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


<<<<<<< Updated upstream
<!--<form method="GET" action= "/traslados/calculoTraslado" >-->
  <div class="row">
     <div class="col-md-6">
       <h5>País del Traslado:</h5>
=======
  <div class="row">
     <div class="col-md-4">
       <h5>Seleccion País del Traslado:</h5>
>>>>>>> Stashed changes
        <select name="pais" onchange="getCiudades()" id="pais" class="form-control">
                <option value="">Elegir País</option>
              
                  @foreach($paises as $pais)

                   <option value="{{$pais['pais']}}">{{$pais['pais']}}</option>

                  @endforeach
            
              
        </select>
      </div>
<<<<<<< Updated upstream

     <div class="col-md-6">
       <h5>Ciudad del Traslado: </h5>

       <select name="ciudad" onchange="getAeropuertos()" id="ciudad" class="form-control">
                <option value="">Elegir Ciudad</option>
=======
  
     <div class="col-md-4">
       <h5>Seleccione Ciudad del Traslado: </h5>

       <select name="ciudades" onchange="getAeropuertos()" id="ciudades" class="form-control">
                <option value="0">Elegir Ciudad</option>
>>>>>>> Stashed changes
              
              
                   
        </select>
     </div>
 </div>

<br><br><br><br>



<div class="row">
<<<<<<< Updated upstream
     <div class="col-md-6">
       <h5>Aeropuerto Origen (A):</h5>
        
        <select name="aeropuerto" onchange="getHoteles()" id="aeropuerto" class="form-control">
                <option value="0">Elegir Aeropuerto</option>                                        
        </select>
      </div>
  


     <div class="col-md-6">
       <h5>Hotel Destino (B): </h5>

       <select name="hotel" onchange="getCoordenadas()" id="hotel" class="form-control">
                <option value="0">Elegir Hotel</option>   
=======
     <div class="col-md-4">
       <h5>Seleccion Aeropuerto Origen:</h5>
        
        <select name="aeropuerto" id="aeropuertos" class="form-control">
                <option value="0">Aeropuerto</option>
              

                
            
              
        </select>
      </div>
  
     <div class="col-md-4">
       <h5>Seleccione Hotel Destino: </h5>

       <select name="" class="form-control">
                <option value="0">Hotel</option>
              
               
            
              
>>>>>>> Stashed changes
        </select>
     </div>
 </div>


<br><br>


<div class="row">
<<<<<<< Updated upstream
    <div class="col-md-2">
         <h5>Cantidad de Personas: </h5>

         <select name="cantidad" id="cantidad" class="form-control">
=======
    <div class="col-md-4">
         <h5>Seleccione Cantidad de Personas a Trasladar: </h5>

         <select name="" class="form-control">
>>>>>>> Stashed changes
                  <option value="0">Cantidad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
            
          </select>
<<<<<<< Updated upstream
  

    </div>

    <div name="fecha" id="fecha" class="col-md-2">
          <h5>Fecha del Traslado: </h5>
          {{Form::date('fecha', '', ['id' => 'fecha', 'class' => 'form-control promt'])}}
    </div>
 
  <div class="col-md-2">

  <h5>Hora del Traslado: </h5>       
    <select name="horas" id="horas" class="form-control">


                  <option value="99">Hora</option>
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
                  <option value="99">Minutos</option>
                  <option value="0">00</option>
                  <option value="15">15</option>
                  <option value="30">30</option>
                  <option value="45">45</option>
                  
          </select>
  </div>

</div>

<br><br>


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


  <div class="col-md-4">
  <h6><input onclick="ejecutar_mapa()" class="btn btn-primary" id="get" name="obtener_direccion" value="Obtener Ruta"></h6>
  </div>

  
  <div id="map-canvas" style="width: 500px; height: 500px;"></div>

  <br><br>


      <script> 


          function ejecutar_mapa(){

            var directionsDisplay = new google.maps.DirectionsRenderer();
            var directionsService = new google.maps.DirectionsService();

            var map;

            var origen = new google.maps.LatLng(44,44);  
            var destino  = new google.maps.LatLng(45,45);

            var mapOptions = {
              zoom: 15,
              center: origen
            };

            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

            directionsDisplay.setMap(map);
                
            var request = {

              origin: origen,
              destination: destino,
              travelMode: 'DRIVING'

            };

            directionsService.route(request, function(result, status){

                if(status == "OK"){

                  directionsDisplay.setDirections(result);

                }
        
            });
          }

         

    
    </script>


</body>

</html>



</div>


  <div class="row">
    <div class="col-md-4">
        <a href="/" class="btn btn-danger" role="button"> Volver </a>
    </div>
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
        <h6><input class="btn btn-primary"type="submit" name="submit" value="Continuar"></h6>
    </div> 
  </div>


<!--</form>-->
=======
         
    </div>
</div>

















<?php
 /*<div class="form-group">
   <h5>Seleccione el Aeropuerto Origen: </h5>
   <select>
    
            <option value="0">Hotel</option>
          
              @foreach($lista_paises as $pais)

              <option value=$pais>{{$pais->pais}}</option>

              @endforeach
        
          
    </select>
 </div>

 <div class="form-group">
   <h5>Seleccione el Hotel Destino: </h5>
   <select>
    
            <option value="0">Aeropuerto</option>
          
              @foreach($lista_paises as $pais)

              <option value=$pais>{{$pais->pais}}</option>

              @endforeach
        
          
    </select>
 </div>

   <div class="form-group">
     <h5>Seleccione Cantidad de Personas a Trasladar: </h5>

     <select>
              <option value="0">Cantidad</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
        
      </select>
     
   </div>
<div class="form-row">
<div id="fecha_traslado" class="form-group col-lg-2 col-md-6 col-sm-12">
<label for="fechaTraslado" class="ui input label">Elige fecha del traslado... </label>
{{Form::date('fechaTraslado', '', ['id' => 'fechaTraslado', 'class' => 'form-control promt'])}}
</div>
</div>
 <h6><input class="btn btn-primary"type="submit" name="submit" value="Ingresar"></h6>
 <a href="/" class="btn btn-danger" role="button"> Volver </a>
</div> */?>


>>>>>>> Stashed changes

<script src="/js/traslados/create-traslado-aeropuertoHotel.js"></script>




<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
@endsection




  


