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
        	var $ciudadesSelect = $("#ciudades");
        	$ciudadesSelect.empty(); // remove old options
        	$ciudadesSelect.append($("<option></option>")
            .attr("value", '').text('Elegir Ciudad'));
	        // for each set of data, add a new option
	        for (var i = 0; i < ciudades.length; i++) {
	        	$ciudadesSelect.append('<option value='+ciudades[i].ciudad+'>'+ciudades[i].ciudad+'</option>');
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


function getAeropuertos() {
	var ciudad = $('#ciudad').val();
	$.ajax({
		url: '/traslados/queryAeropuerto',
		dataType: "json",
		data: { ciudad: ciudad},
		method: 'GET',
		success: 
		function(response){
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
		},
		error: function(error, a, b){
			console.log(error);
			console.log(a);
			console.log(b);
		}
	});

	return false;
}


