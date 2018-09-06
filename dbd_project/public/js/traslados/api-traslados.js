        



function obtener_destino_hotel(callback){

  var hotel = $('#hotel').val();
  var respuesta;

  $.ajax({
    url: '/traslados/queryDestinoHotel',
    dataType: "json",
    data: { hotel : hotel},
    method: 'GET',
    
    success: function(res){
      //console.log(coordenadas_destino_hotel);
      //console.log(coordenadas_destino_hotel); 
      //h_lat = coordenadas_destino_hotel.aero_lat[0].latitud;
      //h_lon = coordenadas_destino_hotel.aero_lon[0].longitud;
      respuesta=res;

      callback(respuesta);
    },
    error: function(error, a, b){
      console.log(error);
      console.log(a);
      console.log(b);
    }
  });

  return respuesta;
}


//    se obtiene la latitud y longitud del aeropuerto que se ingreso

function obtener_origen_aeropuerto(){

  var cod_aeropuerto = $('#aeropuerto').val();
  var coordenadas_origen_aeropuerto;

  $.ajax({
    url: '/traslados/queryOrigenAeropuerto',
    dataType: "json",
    data: { cod_aeropuerto : cod_aeropuerto},
    method: 'GET',
    success: 

    function(response){
      coordenadas_origen_aeropuerto = response;
      //console.log(coordenadas_origen_aeropuerto.aero_lat[0].latitud);
      //console.log(coordenadas_origen_aeropuerto.aero_lon[0].longitud);
      
      a_lat = coordenadas_origen_aeropuerto.aero_lat[0].latitud;
      a_lon = coordenadas_origen_aeropuerto.aero_lon[0].longitud;

      obtener_destino_hotel(function(resultado){

          //console.log(resultado.h_lat[0].latitud);
          //console.log(resultado.h_lon[0].longitud);
          //console.log(coordenadas_origen_aeropuerto.aero_lat[0].latitud);
          //console.log(coordenadas_origen_aeropuerto.aero_lon[0].longitud);

          h_lat = resultado.h_lat[0].latitud;
          h_lon = resultado.h_lon[0].longitud;
          ejecutar_mapa(a_lat,a_lon,h_lat,h_lon);

          var distancia = getDistance(a_lat,a_lon,h_lat,h_lon);
          distancia = distancia/1000;
          distancia = distancia.toFixed(2);

          //console.log(distancia);

          var $distanciaField = $("#distancia");

          $distanciaField.text(distancia);

        }
      );

      //var coordenadas_destino_hotel = obtener_destino_hotel();

      //console.log(coordenadas_destino_hotel);

      //console.log(coordenadas_destino_hotel.h_lat[0].latitud);
      //console.log(coordenadas_destino_hotel.h_lon[0].longitud);

      //ejecutar_mapa(a_lat,a_lon);

    },
    error: function(error, a, b){
      console.log(error);
      console.log(a);
      console.log(b);
    }
  });

  return false;
}




function ejecutar_mapa(latOrigen,lonOrigen,latDestino,lonDestino){

  var map;

  var directionsDisplay = new google.maps.DirectionsRenderer();
  var directionsService = new google.maps.DirectionsService();

  
  var origen = new google.maps.LatLng(latOrigen,lonOrigen);  
  var destino  = new google.maps.LatLng(latDestino,lonDestino);

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


//CALCULAR DISTANCIA ENTRE 2 PUNTOS 


var rad = function(x) {
  return x * Math.PI / 180;
};

var getDistance = function(o_lat, o_lon,d_lat,d_lon) {
  var R = 6378137; // Earth’s mean radius in meter
  var dLat = rad(d_lat - o_lat);
  var dLong = rad(d_lon - o_lon);
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(o_lat)) * Math.cos(rad(d_lat)) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d; // returns the distance in meter
};
