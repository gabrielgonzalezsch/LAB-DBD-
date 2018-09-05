@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<div class="banner slider">
    <div id="demo" class="carousel slide" data-ride="carousel"  data-interval="false">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<center> <img src="https://i.pinimg.com/originals/53/9e/06/539e06704600dc1f4ddce3f534957581.jpg" style="max-width: 50%;"> </center>
     
      <div class="carousel-caption">
        <div class="col-md-7">
            <h1 class="pb-2"><strong>Viaja por el mundo </strong> </h1>
            <h4>Cumple tus sueños</h4>
            <button type="button" class="btn btn-success mt-4">Revisa los vuelos</button>  
        </div>
      </div>   
    </div>
    <div class="carousel-item">
      <center><img src="images/hotel2.jpg" style="max-width:2000%"></center>
      <div class="carousel-caption">
        <div class="col-md-7">
            <h1 class="pb-2"><strong>Elige tu hotel</strong> </h1>
            <h4>Disfruta de una estancia a tu medida.</h4>
            <button type="button" class="btn btn-success mt-4">Revisa los hoteles</button>
        </div>
      </div>   
    </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>
<div class="upcoming py-5">
    <div class="container">
    <div class="row pb-4 text-center">
        <div class="col-md-12">
            <h2>Hoteles destacados</h2>
        </div>
    </div>
	<div class="row text-center">
		@if(!empty($hoteles))
		<p>prueba if</p>
		@foreach($hoteles as $hotel)
		<div class="col-md-3 box border py-4">
		    <div class="box-carimage">
		        <img src="https://img0.gaadicdn.com/images/car-images/265x110/Mahindra/Mahindra-XUV500-2018/6334/047.jpg" alt="">
		    </div>
		    <div class="box-cartitle">
		        <h4>Nombre hotel: {{$hotel->nombre_hotel}}</h4>
		    </div>
		    <div class="box-carprice">
		        <h6>Valoracion: {{$hotel->valoracion}}</h6>
		    </div>
		    <div class="box-date pb-3">
		        <small>País: {{$hotel->pais}}, Ciudad: {{$hotel->ciudad}} </small>
		        
		    </div>
		    <a href="/hoteles/{{$hotel->id_hotel}}" class="btn btn-info">Ver todos los hoteles</a>
		</div>

		@endforeach
		@else
		todavia no hay reportes generados
		@endif
	</div>
	<div class="row text-center pt-4">
	    <div class="col-md-12">
	        <a href="/hoteles" class="btn btn-primary">Ver todos los hoteles</a>
	    </div>
	</div>
</div>
</div>
<div class="popular py-5">
    <div class="container">
    <div class="row pb-4 text-center">
        <div class="col-md-12">
            <h2>Vuelos en oferta</h2>


        </div>
    </div>
    <div class="row text-center">
		@if(!empty($vuelos))
		<p>prueba if</p>
		@foreach($vuelos as $vuelo)
		<div class="col-md-3 box border py-4">
		    <div class="box-carimage">
		        <img src="https://img0.gaadicdn.com/images/car-images/265x110/Mahindra/Mahindra-XUV500-2018/6334/047.jpg" alt="">
		    </div>
		    <div class="box-cartitle">
		        <h4>Aerolínea: {{$vuelo->nombre_aerolinea}}</h4>
		    </div>
		    <div class="box-carprice">
		        <h6>Descuento: {{$vuelo->descuento}}%</h6>
		    </div>
		    <div class="box-date pb-3">
		        <small>Origne: {{$vuelo->aeropuerto_origen}}, Destino: {{$vuelo->aeropuerto_destino}} </small>
		       
		    </div>
		    <button type="button" class="btn btn-outline-danger">Check Price</button>
		</div>

		@endforeach
		@else
		todavia no hay reportes generados
		@endif
	</div>
	</div>
	<div class="row text-center pt-4">
	    <div class="col-md-12">
	        <a href="/vuelos" class="btn btn-primary">Ver todos los vuelos</a>
	    </div>
	</div>
</div>
</div>


@endsection
