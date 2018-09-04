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


  <div class="row">
     <div class="col-md-4">
       <h5>Seleccion País del Traslado:</h5>
        <select name="pais" onchange="getCiudades()" id="pais" class="form-control">
                <option value="">Elegir País</option>
              
                  @foreach($paises as $pais)

                   <option value="{{$pais['pais']}}">{{$pais['pais']}}</option>

                  @endforeach
            
              
        </select>
      </div>
  
     <div class="col-md-4">
       <h5>Seleccione Ciudad del Traslado: </h5>

       <select name="ciudades" onchange="getAeropuertos()" id="ciudades" class="form-control">
                <option value="0">Elegir Ciudad</option>
              
              
                   
        </select>
     </div>
 </div>

<br><br><br><br>



<div class="row">
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
              
               
            
              
        </select>
     </div>
 </div>


<br><br>


<div class="row">
    <div class="col-md-4">
         <h5>Seleccione Cantidad de Personas a Trasladar: </h5>

         <select name="" class="form-control">
                  <option value="0">Cantidad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
            
          </select>
         
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



<script src="/js/traslados/create-traslado-aeropuertoHotel.js"></script>




@endsection




  


