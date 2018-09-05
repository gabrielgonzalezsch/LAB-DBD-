<<<<<<< Updated upstream


=======
>>>>>>> Stashed changes
function getCiudades() {
	var pais = $('#pais').val();
	$.ajax({
		url: '/traslados/queryCiudad',
		dataType: "json",
		data: { pais: pais},
		method: 'GET',
		success: 
		function(response){
			var ciudades = response;
			console.log(ciudades);
			console.log(ciudades.length);
<<<<<<< Updated upstream
        	var $ciudadesSelect = $("#ciudad");
=======
        	var $ciudadesSelect = $("#ciudades");
>>>>>>> Stashed changes
        	$ciudadesSelect.empty(); // remove old options
        	$ciudadesSelect.append($("<option></option>")
            .attr("value", '').text('Elegir Ciudad'));
	        // for each set of data, add a new option
	        for (var i = 0; i < ciudades.length; i++) {
<<<<<<< Updated upstream
	        	$ciudadesSelect.append('<option value='+ciudades[i].cod_aeropuerto+'>'+ciudades[i].ciudad+'</option>');
=======
	        	$ciudadesSelect.append('<option value='+ciudades[i].ciudad+'>'+ciudades[i].ciudad+'</option>');
>>>>>>> Stashed changes
	        }
		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		}
	});

	return false;
}


<<<<<<< Updated upstream
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getAeropuertos(aeropuerto_coordenadas) {
	var ciudad = $('#ciudad').val();

	//console.log(ciudad);

	
=======
function getAeropuertos() {
	var ciudad = $('#ciudad').val();
>>>>>>> Stashed changes
	$.ajax({
		url: '/traslados/queryAeropuerto',
		dataType: "json",
		data: { ciudad: ciudad},
		method: 'GET',
		success: 
		function(response){
<<<<<<< Updated upstream
			var aeropuerto = response;
			console.log(aeropuerto);
			console.log(aeropuerto.length);
        	var $aeropuertoSelect = $("#aeropuerto");
        	$aeropuertoSelect.empty(); // remove old options
        	$aeropuertoSelect.append($("<option></option>")
            .attr("value", '').text('Elegir Aeropuerto'));
	        // for each set of data, add a new option
	        for (var i = 0; i < aeropuerto.length; i++) {
	        	$aeropuertoSelect.append('<option value='+aeropuerto[i].cod_aeropuerto+'>'+aeropuerto[i].cod_aeropuerto+'</option>');
	        }

	        console.log(aeropuerto[0].latitud);
	        console.log(aeropuerto[0].longitud);


=======
			var aeropuertos = response;
			console.log(aeropuertos);
			console.log(aeropuertos.length);
        	var $aeropuertosSelect = $("#aeropuertos");
        	$aeropuertosSelect.empty(); // remove old options
        	$aeropuertosSelect.append($("<option></option>")
            .attr("value", '').text('Elegir Aeropuerto'));
	        // for each set of data, add a new option
	        for (var i = 0; i < aeropuertos.length; i++) {
	        	$aeropuertosSelect.append('<option value='+aeropuertos[i].cod_aeropuerto+'>'+aeropuertos[i].cod_aeropuerto+'</option>');
	        }
>>>>>>> Stashed changes
		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		}
	});

	return false;
}


<<<<<<< Updated upstream
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getHoteles() {
	var cod_aeropuerto = $('#aeropuerto').val();

	//console.log(ciudad);

	$.ajax({
		url: '/traslados/queryHotel',
		dataType: "json",
		data: { cod_aeropuerto: cod_aeropuerto},
		method: 'GET',
		success: 
		function(response){
			var hotel = response;
			console.log(hotel);
			console.log(hotel.length);
        	var $hotelSelect = $("#hotel");
        	$hotelSelect.empty(); // remove old options
        	$hotelSelect.append($("<option></option>").attr("value", '').text('Elegir Hotel'));
	        // for each set of data, add a new option
	        for (var i = 0; i < hotel.length; i++) {
	        	$hotelSelect.append('<option value='+hotel[i].id_hotel+'>'+hotel[i].nombre_hotel+'</option>');
	        }



	            
		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		
		}
	});

	return false;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getCoordenadas() {
	//var lat_hotel = $('#lat_hotel').val();
	//console.log(lat_hotel.toString());

	/*$.ajax({
		url: '/traslados/queryCoordenadas',
		dataType: "json",
		method: 'GET',
		success: 
		function(response){
			var coordenadas = response;
			//console.log(coordenadas);
			//console.log(coordenadas.length);
        	
			console.log(coordenadas['lat_hotel']);

	        
	       
		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		
		}
	});*/


	
	return false;
}


=======
>>>>>>> Stashed changes
