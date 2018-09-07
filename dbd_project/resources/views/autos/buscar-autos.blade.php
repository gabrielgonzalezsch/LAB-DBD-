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
  <h1 class="display-4">Auto</h1>
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
</div>
</div>
<div>
  <h1>Todos los Autos: </h1>
@if(isset($autos))
  @if(count($autos) > 0)
    <ul>
      @foreach($autos as $auto)
      <li>
        <h3><a href="/autos/{{$auto->id_auto}}">{{$auto->modelo_auto}}</a></h3>
        <small>Valor por dia: {{$auto->precio_por_dia}}</small>
      </li>
      @endforeach
    </ul>
    {{$autos->links()}}
    <a href="/" class="button" role="button"> Volver </a>
  @else
    <p>No se encontraron autos!</p>
    <a href="/" class="button" role="button"> Volver </a>
  @endif
@endif
</div>
@endsection
