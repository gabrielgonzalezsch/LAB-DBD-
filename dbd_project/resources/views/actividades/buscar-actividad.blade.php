@extends('layouts.app')
@section('content')
<style>
  .ui.fluid.card *{
    margin: 0;
  }
</style>
<div class="jumbotron jumbotron-fluid">
 <div class="container">
  <h1 class="display-4">actividades</h1>
  <p class="lead"></p>
  <div class="ui two column grid">
    <div class="column">
    <div class="ui fluid card">
      <h2 class="ui centered header" for="ciudad">Busca las actividades de alguna ciudad</h2>
      <div class="content">
        {!! Form::open(['route'=> 'actividades.buscarPorCiudad', 'method' => 'GET', 'class' => 'card-body']) !!}
        {{Form::text('ciudad', '', ['class' => 'form-control', 'placeholder' => 'Escribe una ciudad...'])}}
      </div>
        {{Form::submit('Buscar', ['class' => 'ui bottom attached blue button'])}}
        {!! Form::close() !!}
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
            <img src="images/{{$actividad->nombre_actividad}}{{$array[rand(0,3)]}}.jpg"  width="100%" height = 170px>
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
