@extends('layouts.app')
@section('content')
<!-- <div class="container">
	<div class="row">
			<center>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>foto</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Subtotal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</center>
	</div>

	<div  class="row">

	<h2>Total: S/. <span id="valor"></span></h2>
	<input type="hidden" name="" id="total" value="">

	<div id="idPayuButtonContainer">
	</div>
	</div> -->
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
					<li>Valor: {{$item->precio}}</li>
					<li>Cantidad: {{$item->cantidad}}</li>
					<li>Subtotal: {{$item->subtotal}}</li>
	      </ul>
	      <div class="extra">
	        *Incluye IVA
	      </div>
				<button onclick="eliminarDelCarrito({{$key}})" class="btn btn-danger"> Eliminar del carrito </button>
	    </div>
	  </div>
	@endforeach
 <div>
	<h4>Total: {{$carrito->total}}</h4>
 </div>
 <a role="button" href="/comprar" class="btn btn-primary"> Comprar </a>
	@else
	<div>
		<h3> El carrito esta vacío! </h3>
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
