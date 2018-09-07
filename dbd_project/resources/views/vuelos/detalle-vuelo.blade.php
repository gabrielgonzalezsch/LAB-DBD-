@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<div class="ui fluid container">
	<div class="ui segment column ">
		<h1 class="ui header">Detalles del vuelo :
			<span id="vuelo">{{$vuelo->nombre_avion}}
			</span>
		</h1>
		<div class="content">
			<div style="padding: 5px; width: 100%;" class="ui huge orange ribbon label"> Precios desde: {{$vuelo->valor_turista}}
			</div>
			<div class="ui star rating" data-rating="3">
			</div>
			<div class="ui horizontal divider header"><h1>{{$vuelo->nombre_avion}}</h1>
			</div>
			<div class="image">
				<center><img src="/images/{{$vuelo->nombre_aerolinea}}.png"  alt="Card image cap" style="width: 20%"></center>
			</div>
		</div>
		<ul>
			<dl><h4> Aerolinea: {{$vuelo->nombre_aerolinea}} </h4></dl>
			<dl><h4> Origen:  {{$cOri}},{{ $pOri}} </h4></dl>
			<dl><h4> Destino: {{$cDes}},{{ $pDes}} </h4></dl>
			<dl><h4> Maletas por persona: {{$vuelo->maletas_por_persona}}</h4></dl>
			<dl><h4> Valor pasaje clase turista: ${{$vuelo->valor_turista}}</h4></dl>
			<dl><h4> Capacidad clase turista: {{$vuelo->cap_turista}} </h4></dl>
			<dl><h4> Valor pasaje clase ejecutivo: ${{$vuelo->valor_ejecutivo}}</h4></dl>
			<dl><h4> Capacidad clase ejecutivo: {{$vuelo->cap_ejecutivo}} </h4></dl>
			<dl><h4> Valor pasaje primera clase: ${{$vuelo->valor_primera_clase}}</h4></dl>
			<dl><h4> Capacidad primera clase: {{$vuelo->cap_primera_clase}} </h4></dl>
		</ul>
		<div class="ui horizontal divider"><h5> Detalles de origen y destino </h5></div>
			<ul>
				<dl><h4> Aeropuerto origen: {{$vuelo->aeropuerto_origen}}</h4></dl>
				<dl><h4> Aeropuerto destino: {{$vuelo->aeropuerto_destino}}</h4></dl>
				<dl><h4> Fecha de salida del vuelo desde el aeropuerto de origen: {{$vuelo->fecha_salida}} {{$vuelo->hora_salida}}</h4></dl>
				<dl><h4> Fecha de llegada estimada al aeropuerto de destino: {{$vuelo->fecha_llegada}}  {{$vuelo->hora_llegada}}</h4></dl>
				<dl><h4>Tiempo de viaje estimado: {{$horas}}</h4></dl>
			</ul>
			<div class= "ui horizontal divider"><h5> Proceso de compra </h5>
			</div>
			<div class="busqueda-row">
				<div class = "form-row">
					<div class="form-group col-2">
						<label class="form-input">Ingresa numero de pasajes turista</label>
						<input id="num_turista" type="number" min="0" max="{{$vuelo->cap_turista}}" class="form-control" value=0>
					</div>
					<div class="form-group col-2">
						<label class="form-input">Ingresa numero pasajes ejecutivo</label>
						<input id="num_ejecutivo" type="number" min="0" max="{{$vuelo->cap_ejecutivo}}" class="form-control" value=0>
					</div>
					<div class="form-group col-2">
						<label class="form-input">Ingresa numero pasajes primera clase</label>
						<input id="num_pc" type="number" min="0" max="{{$vuelo->cap_primera_clase}}" class="form-control" value=0>
					</div>
				</div>
				<div class ="form-group col-3">
					<div class="ui left action input row">
						<button onclick="addCarrito({{$vuelo->id_vuelo}})" class="ui teal labeled icon button col-md-6">
							<i class="cart icon"></i>
							Al carrito
						</button>
						<a href="/carrito" class="btn btn-primary">Checkout</a>
					</div>
				</div>
			</div>
			<center><a href="/vuelos" class="btn btn-info" role="button"> Volver a vuelos </a></center>
		</div>
	</div>
</div>


<style>
	.col-2{
		padding: 10px !important;
		margin: 0 !important;
	}
</style>

<script>
	function addCarrito(id){
		var num_turista = document.getElementById('num_turista').value;
		var num_ejecutivo = document.getElementById('num_ejecutivo').value;
		var num_pc = document.getElementById('num_pc').value;
		addVueloAlCarrito(id, num_turista, num_ejecutivo, num_pc);
	}	
</script>
@endsection
