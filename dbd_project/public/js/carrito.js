function addHabitacionAlCarrito(id_habitacion, nombre, inicio, fin, num_dias){
      $.ajax({
        url : "../../carrito/agregarHabitacion",
        method : "POST",
        data: {id: id_habitacion, nombre: nombre, fecha_inicio: inicio, fecha_fin: fin, cantidad: num_dias},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado "+nombre+" al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          alert('Ha ocurrido un error, compruebe si ha ingresado a su cuenta correctamente');
          console.log(errorThrown);
        }
      });
}

function addTrasladoAlCarrito(id_chofer, ft, d, np, p, c, a, h, formato, ht, mt){
  $.ajax({
    url : "../../carrito/agregarTraslado",
    method : "POST",
    data: {id_chofer: id_chofer, fecha_traslado: ft, distancia: d, pasajeros: np, pais: p, ciudad: c, aeropuerto: a, hotel: h, formato_traslado: formato, hora_traslado: ht, minutos_traslado: mt},
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(){
      alert("Se ha agregado el traslado al carrito de compras!");
    },
    error: function (data, textStatus, errorThrown) {
      console.log(data);
      console.log(textStatus);
      console.log(errorThrown);
    }
  });
}

function addActividadAlCarrito(id_actividad, nombre, num_entradas){
      $.ajax({
        url : "../../carrito/agregarActividad",
        method : "POST",
        data: {id: id_actividad, nombre: nombre, cantidad: num_entradas},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado "+nombre+" al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addAutoAlCarrito(id_auto, nombre, inicio, fin, num_dias){
      $.ajax({
        url : "../../carrito/agregarAuto",
        method : "POST",
        data: {id: id_auto, nombre: nombre, inicio: inicio, fin: fin, cantidad: num_dias},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado "+nombre+" al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addVueloAlCarrito(id_vuelo, turista, ejecutivo, primera_clase){
      $.ajax({
        url : "../../carrito/agregarVuelo",
        method : "POST",
        data: {id: id_vuelo, turista: turista, ejecutivo: ejecutivo, primera_clase : primera_clase},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addJointVueloAlCarrito(id_ida, id_vuelta, turista, ejecutivo, primera_clase){
      var pasajes = {};
      pasajes.turista = turista;
      pasajes.ejecutivo = ejecutivo;
      pasajes.pc = primera_clase;
      var json_pasajes = JSON.stringify(pasajes);
      $.ajax({
        url : "../../carrito/agregarJointVuelo",
        method : "POST",
        data: {id_ida: id_ida, id_vuelta: id_vuelta, pasajes: json_pasajes},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se han agregado los vuelos al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addAutoPaqueteAlCarrito(id_auto, id_paquete, nombre, inicio, fin, num_dias){
      $.ajax({
        url : "../../../carrito/agregarAutoPaquete",
        method : "POST",
        data: {id: id_auto, id_paquete: id_paquete, nombre: nombre, inicio: inicio, fin: fin, cantidad: num_dias},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado "+nombre+" al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addVueloPaqueteAlCarrito(id_vuelo, id_paquete, turista, ejecutivo, primera_clase){
      var pasajes = {};
      pasajes.turista = turista;
      pasajes.ejecutivo = ejecutivo;
      pasajes.pc = primera_clase;
      var json_pasajes = JSON.stringify(pasajes);
      $.ajax({
        url : "../../../carrito/agregarVueloPaquete",
        method : "POST",
        data: {id: id_vuelo, id_paquete: id_paquete, pasajes: json_pasajes},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}

function addJointVueloPaqueteAlCarrito(id_ida, id_vuelta, id_paquete, turista, ejecutivo, primera_clase){
      var pasajes = {};
      pasajes.turista = turista;
      pasajes.ejecutivo = ejecutivo;
      pasajes.pc = primera_clase;
      var json_pasajes = JSON.stringify(pasajes);
      $.ajax({
        url : "../../../carrito/agregarVueloPaquete",
        method : "POST",
        data: {id_ida: id_ida, id_vuelta: id_vuelta, id_paquete: id_paquete, pasajes: json_pasajes},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}



function agregarAlCarrito(id_item, nombre, categoria, cantidad){
      $.ajax({
        url : "../../carrito/agregar",
        method : "POST",
        data: {id: id_item, nombre: nombre, categoria: categoria, cantidad: cantidad},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert("Se ha agregado "+nombre+" al carrito de compras!");
        },
        error: function (data, textStatus, errorThrown) {
          console.log(data);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
}
