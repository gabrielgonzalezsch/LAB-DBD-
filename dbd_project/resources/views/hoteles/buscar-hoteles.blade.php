@extends('layouts.app')
@section('content')
<style>
  .ui.fluid.card *{
    margin: 0;
  }
  body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
  }
  #busqueda .container #busqueda-row #busqueda-column #busqueda-box {
  max-width: 600px;
  height: auto;
  display:inline-block;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  overflow: auto;
  }
  .btn-lg{
    display: inline-block;
    margin-bottom: 5px;
  }
  .centered{
    text-align: center;
  }
</style>
<div class="jumbotron jumbotron-fluid">
 <div class="container">
  <h1 class="display-4">Hoteles</h1>
  <p class="lead"></p>
  <div class="row">
    <div class="column col-md-6 col-sm-12">
      <div id="busqueda">
        <div class="container">
            <div id="busqueda-row" class="row justify-content-center align-items-center">
                <div id="busqueda-column" class="col-md-12">
                    <div id="busqueda-box" class="col-md-12">
                        {!! Form::open(['route'=> 'hoteles.buscarPorCiudad', 'method' => 'GET', 'id' => 'busqueda-form', 'class' => 'form']) !!}
                            <h1 style="margin-top: 8px;" class="text-center text-info">Busca tu hotel por ciudad</h1>
                            <div class="form-group">
                                <label for="pais" class="text-info">Pais:</label><br>
                                <input type="text" name="pais" placeholder="Escribe un país..." class="form-control">
                            </div>
                            <div class="form-row">
                              <div class="form-group col-sm-12 col-md-6">
                                <label for="fecha_inicio" class="text-info">Fecha inicio alojamiento:</label>
                                <input type="date" name="fecha_inicio" class="form-control">
                              </div>
                              <div class="form-group col-sm-12 col-md-6">
                                <label for="fecha_fin" class="text-info">Fecha término alojamiento:</label>
                                <input type="date" name="fecha_fin" class="form-control">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_habitaciones" class="text-info">Número habitaciones:</label>
                                <input type="number" name="num_habitaciones" min=1 value=1 class="form-control"/>
                              </div>
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_adultos" class="text-info">Número adultos</label>
                                <input type="number" name="num_adultos" min=1 value=1 class="form-control"/>
                              </div>
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_menores" class="text-info">Número menores:</label>
                                <input type="number" name="num_menores" min=0 value=0 class="form-control"/>
                              </div>
                            </div>
                            <div class="centered">
                            {{Form::submit('Buscar Hoteles', ['class' => 'btn btn-info btn-lg'])}}
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
    <div class="column col-md-6 col-sm-12">
      <div id="busqueda">
        <div class="container">
            <div id="busqueda-row" class="row justify-content-center align-items-center">
                <div id="busqueda-column" class="col-md-12">
                    <div id="busqueda-box" class="col-md-12">
                        {!! Form::open(['route'=> 'hoteles.buscarPorPais', 'method' => 'GET', 'id' => 'busqueda-form', 'class' => 'form']) !!}
                            <h1 style="margin-top: 8px;" class="text-center text-info">...O busca tu hotel por país</h1>
                            <div class="form-group">
                                <label for="pais" class="text-info">Pais:</label><br>
                                <input type="text" name="pais" placeholder="Escribe una ciudad..." class="form-control">
                            </div>
                            <div class="form-row">
                              <div class="form-group col-sm-12 col-md-6">
                                <label for="fecha_inicio" class="text-info">Fecha inicio alojamiento:</label>
                                <input type="date" name="fecha_inicio" class="form-control">
                              </div>
                              <div class="form-group col-sm-12 col-md-6">
                                <label for="fecha_fin" class="text-info">Fecha término alojamiento:</label>
                                <input type="date" name="fecha_fin" class="form-control">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_habitaciones" class="text-info">Número habitaciones:</label>
                                <input type="number" name="num_habitaciones" min=1 value=1 class="form-control"/>
                              </div>
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_adultos" class="text-info">Número adultos</label>
                                <input type="number" name="num_adultos" min=1 value=1 class="form-control"/>
                              </div>
                              <div class="form-group col-sm-12 col-md-4">
                                <label for="num_menores" class="text-info">Número menores:</label>
                                <input type="number" name="num_menores" min=0 value=0 class="form-control"/>
                              </div>
                            </div>
                            <div class="centered">
                              {{Form::submit('Buscar Hoteles', ['class' => 'btn btn-info btn-lg'])}}
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
