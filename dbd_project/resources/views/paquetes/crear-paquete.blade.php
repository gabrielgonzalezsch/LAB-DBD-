@extends('layouts.app')

@section('title', 'Crear nuevo paquete')

@section('content')
{!! Form::open(['route'=>'paquetes.store', 'method' => 'POST']) !!}
<div class="container-fluid">
<h1>Crear un nuevo paquete</h1>
<div class="row">
  <div class="col-md-3 mb-3">
    <select class="form-control form-control-lg" id="tipo" required name="tipo_paquete">
      <option value="1">
        Vuelo + Hotel
      </option>
      <option value="2">
        Vuelo + Auto
      </option>
    </select>
  </div>
</div>
<div class="form row">
  <div class="col-md-6 mb-3">
  	<label for="id_vuelo">Vuelos:</label>
    <select class="form-control form-control" name="id_vuelo" id="vuelos" onchange="updateDrop()" required>
      <option value="">Escoje un vuelo... </option>
      @foreach($vuelos as $vuelo)
      <option value="{{$vuelo->id_vuelo}}" data-destino="{{$vuelo->aeropuerto_destino}}">
        {{$vuelo->nombre_avion}}, {{$vuelo->nombre_aerolinea}}: {{$vuelo->aeropuerto_origen}} >> {{$vuelo->aeropuerto_destino}}
      </option>
      @endforeach
    </select>
	<div class="invalid-feedback">
		Porfavor entregue un valor para vuelo.
	</div>
  </div>
</div>
<div class="form row">
  <div class="col-md-6 mb-3">
  	<label for="id_hotel">Hoteles:</label>
     <select class="form-control form-control" name="id_hotel" id="hoteles"></select>
    <div class="invalid-feedback">
		Porfavor entregue un valor para hoteles.
	  </div>
  </div>
  <div class="col-md-6 mb-3">
  	<label for="id_auto">Autos:</label>
     <select class="form-control form-control" name="id_auto" id="autos"></select>
    <div class="invalid-feedback">
		Porfavor entregue un valor para auto.
	  </div>
  </div>
</div>
</div>
  <div class="col-md-12">
    {{Form::label('descripcion', 'Descripción del paquete:')}}
    {{Form::text('descripcion', '', ['class' => 'form-control', 'placeholder' => 'Incluye una descripción del paquete'])}}
    {{Form::label('desuento', 'Descuento:')}}
    {{Form::text('descuento', '', ['class' => 'form-control', 'placeholder' => 'En porcentaje'])}}
    {{Form::submit('Crear', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <a class='btn btn-primary' href='/paquetes'> Volver</a>
  </div>
</div>
</div>
<script>
var toggle = document.getElementById('tipo');
var dropAutos = document.getElementById('autos');
var dropHoteles = document.getElementById('hoteles');
toggle.addEventListener('change', function() {
  var tipo = toggle.value;
  if(tipo == '1'){
    dropHoteles.disabled = false;
    dropAutos.disabled = true;
  }else if(tipo == '2'){
    dropHoteles.disabled = true;
    dropAutos.disabled = false;
  }

});
function updateDrop() {
    var tipo = document.getElementById("tipo").value;
    if(tipo == '1'){
      updateDropHoteles();
    }else if(tipo == '2'){
      updateDropAutos();
    }
}


function updateDropHoteles() {
    var dropVuelos = document.getElementById("vuelos");
    var dropHoteles = document.getElementById("hoteles");
    var destino = dropVuelos.options[dropVuelos.selectedIndex].dataset.destino;
    $.ajax({
      url: '/paquetes/getHoteles',
      method: 'get',
      dataType: 'json',
      data: { destino: destino},
      success: function(data){
        console.log(data);
        while (dropHoteles.options.length) {
            dropHoteles.remove(0);
        }
        var i;
        for (i = 0; i < data.length; i++) {
            var hotel = new Option(data[i]['nombre_hotel'], data[i]['id_hotel']);
            dropHoteles.options.add(hotel);
        }
      },
      error: function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
      }
    });
}

function updateDropAutos() {
    var dropVuelos = document.getElementById("vuelos");
    var dropAutos = document.getElementById("autos");
    var destino = dropVuelos.options[dropVuelos.selectedIndex].dataset.destino;
    $.ajax({
      url: '/paquetes/getAutos',
      method: 'get',
      dataType: 'json',
      data: { destino: destino},
      success: function(data){
        console.log(data);
        while (dropAutos.options.length) {
            dropHoteles.remove(0);
        }
        var i;
        for (i = 0; i < data.length; i++) {
            var nombre = data[i]['modelo_auto'] + ', ' + data[i]['compañia'];
            var auto = new Option(nombre, data[i]['id_auto']);
            dropAutos.options.add(auto);
        }
      },
      error: function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
      }
    });
}

</script>

@stop
