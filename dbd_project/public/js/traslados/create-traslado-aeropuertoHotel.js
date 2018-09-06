

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
			//console.log(ciudades);
			//console.log(ciudades.length);
        	var $ciudadesSelect = $("#ciudad");
        	$ciudadesSelect.empty(); // remove old options
        	$ciudadesSelect.append($("<option></option>")
            .attr("value", '').text('Elegir Ciudad'));
	        // for each set of data, add a new option
	        for (var i = 0; i < ciudades.length; i++) {
	        	$ciudadesSelect.append('<option value='+ciudades[i].cod_aeropuerto+'>'+ciudades[i].ciudad+'</option>');
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

function getAeropuertos() {
	var ciudad = $('#ciudad').val();

	//console.log(ciudad);

	$.ajax({
		url: '/traslados/queryAeropuerto',
		dataType: "json",
		data: { ciudad: ciudad},
		method: 'GET',
		success: 
		function(response){
			var aeropuerto = response;
			//console.log(aeropuerto);
			//console.log(aeropuerto.length);
        	var $aeropuertoSelect = $("#aeropuerto");
        	$aeropuertoSelect.empty(); // remove old options
        	$aeropuertoSelect.append($("<option></option>").attr("value", '').text('Elegir Aeropuerto'));
	        // for each set of data, add a new option
	        for (var i = 0; i < aeropuerto.length; i++) {
	        	$aeropuertoSelect.append('<option value='+aeropuerto[i].cod_aeropuerto+'>'+'Aeropuerto Principal de '+aeropuerto[i].ciudad+'</option>');
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
			//console.log(hotel);
			//console.log(hotel.length);
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

function getChoferes() {
	var ciudad = $('#ciudad').val();

	//console.log(ciudad);
	//console.log("hola desde antes de ajax")

	$.ajax({
		url: '/traslados/queryChoferes',
		dataType: "json",
		data: {ciudad: ciudad},
		method: 'GET',
		success: 
		function(response){


			//console.log("hola despues de ajax");
			//console.log(response);
			var chofer = response;
			//console.log(aeropuerto);
			//console.log(aeropuerto.length);
        	var $choferSelect = $("#chofer");
        	var $cantidadSelect = $("#cantidad").val();
        	var $tabla_choferes = $("#tabla_choferes");

        	//console.log($cantidadSelect);
        	$choferSelect.empty(); // remove old options
        	$choferSelect.append($("<option></option>").attr("value", '').text('Elegir chofer'));
	        //for each set of data, add a new option

	        $tabla_choferes.append('<tbody>');

	        for (var i = 0; i < chofer.length; i++) {


	        	if(chofer[i].capacidad_auto >= $cantidadSelect){

	        		$choferSelect.append('<option value='+chofer[i].tarifa_por_kilometro+'>'+chofer[i].name+'</option>');
	        		$tabla_choferes.append('<tr><td> '+' '+ chofer[i].name+'</td><td> '+'$ '+ chofer[i].tarifa_por_kilometro+'</td><td> '+' '+ chofer[i].valorizacion+'</td></tr>');    
	        	}
	        }

	        $tabla_choferes.append('</tbody>');

		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		}
	});

	return false;
}


function getDinero() {
	var distancia = $('#distancia').text();
	var tarifa_chofer = $('#chofer').val();
	var monto_final = $('#carrito')


	console.log(distancia);
	console.log(tarifa_chofer);

	console.log(distancia*tarifa_chofer)



    //for each set of data, add a new option

	

	return false;
}