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
  <center>
  <p class="lead"></p>
  <div class="row">
    <div class="col">
      <div id="busqueda">
        <div class="container">
            <div id="busqueda-row" class="row justify-content-center align-items-center">
                <div id="busqueda-column" class="col-md-12">
                    <div id="busqueda-box" class="col-md-12">
                        {!! Form::open(['route'=> 'autos.buscar', 'method' => 'GET', 'id' => 'busqueda-form', 'class' => 'form']) !!}
                            <h1 style="margin-top: 8px;" class="text-center text-info">Busca tu auto por ciudad</h1>
                            <div class="form-group">
                                <label for="ciudad" class="text-info">Ciudad:</label><br>
                                <input type="text" name="ciudad" placeholder="Escribe una ciudad..." class="form-control">
                            </div>
                            <div class="centered">
                            {{Form::submit('Buscar Auto', ['class' => 'btn btn-info btn-lg'])}}
                            </div>
                          {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</center>
</div>
</div>
<div>
  <h1 class="ui horizontal divider header">Todos los autos: </h1>
    @if(count($autos) > 0)
    <div class="ui three stackable cards">
    @foreach($autos as $auto)
      <div class="ui fluid raised card">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: ${{$auto->precio_por_dia}} por dia
          </div>
          <div class="ui horizontal divider header">{{$auto->compañia}},{{$auto->modelo_auto}}</div>
          <center><img src="images/{{$auto->compañia}}.png" width="100%" height = 220px></center>
          <small></small>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Disponibilidad en:</div>
            <div class="content">
              {{$auto->ciudad,$auto->pais}}</div>
          </div>
          <div class="item">
            <div class="header">Capacidad: </div>
            <div class="content">
              {{$auto->capacidad}}
            </div>
          </div>
            <div class="item">
            <div class="header">Descripcion: </div>
            <div class="content">
              {{$auto->descripcion}}
            </div>
          </div>
          <a href="/autos/{{$auto->id_auto}}" class="ui bottom attached blue button">
          <i class="fas fa-search"></i>
          Ver detalles
          </a>
        </div>
      </div>
    @endforeach
    </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$autos->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/autos" class="btn btn-primary" role="button"> Volver </a>
  @else
    <p>No se encontraron autos!</p>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver al inicio</a>
    @endif
  </div>
</div>
@endsection
