@extends('layouts.app')
@section('content')
<div class="ui segment divided items">
	@if(count($carrito->items) > 0)
	  @foreach($carrito->items as $key => $item)
	  <div class="item">
	    <div class="image">
	      <img src="{{ asset('/storage/hoteles/foto-hotel-default') }}">
	    </div>
	    <div class="content">
	      <a class="header">{{$item->nombre}}</a>
	      <div class="meta">
					<span>{{$item->categoria}}</span>
	      </div>
	      <ul class="description">
					@if($item->categoria == 'Vuelo')
					<li>Tipo pasaje: {{$item->tipo_pasaje}}</li>
					@endif
					<li>Valor: {{$item->precio}}</li>
					@if($item->categoria == 'Habitación')
						<li>Número de noches: {{$item->cantidad}}</li>
					@else
					<li>Cantidad: {{$item->cantidad}}</li>
					@endif
					<li>Descuento: {{$item->descuento}}%</li>
					<li>Subtotal: $ {{$item->subtotal}}</li>
	      </ul>
	      <div class="extra">
	        *Incluye IVA
	      </div>
				<button onclick="eliminarDelCarrito({{$key}})" class="btn btn-danger"> Eliminar del carrito </button>
	    </div>
	  </div>
	@endforeach
	<div class="ui tablet stackable steps">
  <div class="step">
    <i class="cart icon"></i>
    <div class="content">
			<div class="ui small statistic">
		 	<label class="title">Esta compra</label>
		 	<div class="value"> $ {{$carrito->total}} CLP </div>
		  </div>
    </div>
  </div>
  <div class="active step">
    <i class="dollar icon"></i>
    <div class="content">
			<div class="ui small statistic">
		 	<label class="title">Mis fondos</label>
		 	<div class="value"> $ {{Auth::user()->fondos_disponibles}} CLP </div>
    </div>
		</div>
  </div>
	@if(isset($failure))
	<div class="disabled step">
		<i class="info circle icon"></i>
		<div class="content">
			<strong class=""> No hay suficientes fondos disponibles para realizar esta compra </strong>
		</div>
	</div>
	@else
	<div class="active step">
    <i class="dollar icon"></i>
    <div class="content">
			<div class="ui small statistic">
				<div class="title">Fondos restantes</div>
		 	<div class="value"> $ {{Auth::user()->fondos_disponibles - $carrito->total}} CLP </div>
		  </div>
    </div>
  </div>
	</div>
	@if(!isset($failure))
	<div class="row">
		<div class="massive ui vertical animated button" tabindex="0">
			<div class="hidden content"><a href="/comprar">Comprar</a></div>
			<div class="visible content">
				<i class="shop icon"></i>
			</div>
		</div>
	</div>
	@endif
	@endif
</div>
@else
	<div class="ui segment">
		<h3 class="ui header"> El carrito esta vacío! </h3>
	</div>
@endif
</div>
	<script>
		function eliminarDelCarrito(index_item){
			$.ajax({
				url: "/carrito/eliminar",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: { index : index_item},
				method: 'GET',
				success: function(){
					alert('Eliminado del carrito con éxito');
					location.reload();
				},
				error : function(){
					alert('Hubo un error al eliminar del carrito');
					location.reload();
				}
			});
		}
		function comprar(){

		}
	</script>
@stop
