function addHabitacionAlCarrito(id_habitacion, nombre, num_dias){
      $.ajax({
        url : "../../carrito/agregarHabitacion",
        method : "POST",
        data: {id: id_habitacion, nombre: nombre, cantidad: num_dias},
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
        method : "GET",
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
