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
</style>
<div class="jumbotron jumbotron-fluid">
 <div class="container">
  <p class="lead"></p>
  <div class="row">
    <div class="column col-md-6 col-sm-12">
      <div id="busqueda">
        <div class="container">
            <div id="busqueda-row" class="row justify-content-center align-items-center">
                <div id="busqueda-column" class="col-md-12">
                    <div id="busqueda-box" class="col-md-12">
                      {!! Form::open(['route'=> 'actividades.buscarPorCiudad', 'method' => 'GET', 'class' => 'card-body']) !!}
                      <h1 style="margin-top: 8px;" class="text-center text-info">Busca las actividades de cada ciudad</h1>
                      {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => 'Escribe una ciudad...'])}}
                    </div>
                    <center>{{Form::submit('Buscar', ['class' => 'ui bottom attached blue button'])}}
                    {!! Form::close() !!}</center>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>





<div class="ui segment">
  <h1 class="ui header">Todos los actividades: </h1>
  <div class="ui divider"> </div>
  @if(count($actividades) > 0)
  <div class="ui three stackable cards">
    @foreach($actividades as $actividad)
      @if($actividad->cupos > 0)
      <div class="ui fluid raised card" data-html="<div class='header'>User Rating</div><div class='content'><div class='ui star rating'><i class='active icon'></i><i class='active icon'></i><i class='active icon'></i><i class='icon'></i><i class='icon'></i></div></div>">
        <div class="content">

            <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: {{$actividad->valor_entrada}}
          </div>
          <div class="ui star rating" data-rating="3"></div>
          <div class="ui horizontal divider header">{{$actividad->nombre_actividad}}</div>
          <div class="image">
            <img src="/images/{{$actividad->nombre_actividad}}{{$array[rand(0,3)]}}.jpg"  width="100%" height = 170px>
          </div>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Ubicación:</div>
            <div class="content">
              {{$actividad->ciudad}}, {{$actividad->pais}}
            </div>
          </div>
          <div class="item">
            <div class="header">Descuento:</div>
            <div class="content">
              {{$actividad->descuento}}%
            </div>
          </div>
          <div class="item">
            <div class="header">cupos:</div>
            <div class="content">
              {{$actividad->cupos}}
            </div>
          </div>
          <a href="/actividades/{{$actividad->id_actividad}}" class="ui bottom attached blue button">
            <i class="fas fa-search"></i>
            Ver más
          </a>
        </div>
      </div>
      @endif
    @endforeach
  </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$actividades->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @else
    <div class="ui segment"
    <h2 class="ui header">No se encontraron actividades!</h2>
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

@endsection
