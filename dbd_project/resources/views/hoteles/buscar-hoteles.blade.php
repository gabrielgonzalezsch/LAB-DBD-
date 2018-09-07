@extends('layouts.app')
@section('content')
<style>
  .ui.fluid.card *{
    margin: 0;
  }
</style>
<div class="jumbotron jumbotron-fluid">
 <div class="container">
  <h1 class="display-4">Hoteles</h1>
  <p class="lead"></p>
  <div class="ui two column grid">
    <div class="column">
    <div class="ui fluid card">
      <h2 class="ui centered header" for="ciudad">Busca tu hotel según ciudad</h2>
      <div class="content">
        {!! Form::open(['route'=> 'hoteles.buscarPorCiudad', 'method' => 'GET', 'class' => 'card-body']) !!}
        {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => 'Escribe una ciudad...'])}}
      </div>
        {{Form::submit('Buscar', ['class' => 'ui bottom attached blue button'])}}
        {!! Form::close() !!}
    </div>
    </div>
    <div class="column">
    <div class="ui fluid card">
      <h2 class="ui centered header" for="pais">...O busca tu hotel según país</h2>
        <div class="content">
          {!! Form::open(['route'=> 'hoteles.buscarPorPais', 'method' => 'GET', 'class' => 'card-body']) !!}
          {{Form::text('pais', '', ['class' => 'form-control', 'placeholder' => 'Escribe un país...'])}}
        </div>
          {{Form::submit('Buscar', ['class' => 'ui bottom attached blue button'])}}
          {!! Form::close() !!}
    </div>
   </div>
  </div>
</div>
<div class="ui segment">
  <h1 class="ui header">Todos los hoteles: </h1>
  <div class="ui divider"> </div>
  @if(count($hoteles) > 0)
  <div class="ui three stackable cards">
    @foreach($hoteles as $hotel)
      @if($hotel->habitaciones_disponibles >= 0)
      <div class="ui fluid raised card" data-html="<div class='header'>User Rating</div><div class='content'><div class='ui star rating'><i class='active icon'></i><i class='active icon'></i><i class='active icon'></i><i class='icon'></i><i class='icon'></i></div></div>">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: {{$hotel->precio_min_habitacion}}
          </div>
          <div class="ui star rating" data-rating="3"></div>
          <div class="ui horizontal divider header">{{$hotel->nombre_hotel}}</div>
          <div class="image">
            <img src="/images/{{$hotel->valoracion}}.jpg"  width="100%" height = 170px>
          </div>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Ubicación:</div>
            <div class="content">
              {{$hotel->ciudad}}, {{$hotel->direccion}}
            </div>
          </div>
          <div class="item">
            <div class="header">Valoración:</div>
            <div class="content">
              {{$hotel->valoracion}}
            </div>
          </div>
          <div class="item">
            <div class="header">Habitaciones disponibles:</div>
            <div class="content">
              {{$hotel->habitaciones_disponibles}}
            </div>
          </div>
          <a href="/hoteles/{{$hotel->id_hotel}}" class="ui bottom attached blue button">
            <i class="fas fa-search"></i>
            Ver más
          </a>
        </div>
      </div>
      @endif
    @endforeach
  </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$hoteles->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @else
    <div class="ui segment"
    <h2 class="ui header">No se encontraron hoteles!</h2>
    <a style="margin-left: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
    </div>
  @endif
  </div>
</div>
<style>
  .ui.card{
    padding: 10px;
  }
  .image{
    height: 300px;
  }
  .image img{
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
  .ui.star.rating{
    width : 30px;
    height: 20px;
  }
</style>
<script>
  $(document).ready(function(){
    // $('.ui.star.rating').rating();
      // var cards = document.getElementsByName('hotel-card');
      // for(i = 0; i < cards.lenght; i++){
      //   cards[i].rating();
      // }
    // $('#buscador').submit(function(){
    //     var filtro = document.getElementById('#filtro').value();
    //     alert(filtro);
    //     $.ajax({
    //       url: "/hoteles/buscar",
    //       method: "GET",
    //       data: {filtro : filtro},
    //       headers: {
  	// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  	// 			},
    //       success: function(){
    //         console.log('Busqueda exitosa');
    //       },
    //       errors: function(data, error, errorData){
    //         alert(data);
    //         alert(error);
    //         alert(errorData);
    //       }
    //     });
    //     return false;
    //   });
    });
    // function buscar(){
    //   var filtro = document.getElementById('filtro').value;
    //   alert(filtro);
    //       $.ajax({
    //         url: "",
    //         method: "GET",
    //         data: {filtro : filtro},
    //         headers: {
    // 					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // 				},
    //         success: function(){
    //           console.log('Busqueda exitosa');
    //         },
    //         errors: function(data, error, errorData){
    //           alert(data);
    //           alert(error);
    //           alert(errorData);
    //         }
    //       });
    //   return false;
    // }
</script>
@endsection
