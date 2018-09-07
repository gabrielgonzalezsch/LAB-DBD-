@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Paquete vuelo y auto</h1>
    <p class="lead">Aqui se muestran los autos de paquetes que cumplen con los criterios</p>
  </div>
</div>
<div class="ui divider"></div>
<div class="ui segment">
  <div class="ui four top attached steps">
    <div class="step">
      <i class="check icon"></i>
      <div class="content">
        <div class="title"> Buscar un vuelo </div>
        <div class="description"> Elige un vuelo a tu destino </div>
      </div>
    </div>
    <div class="active step">
       <i class="car icon"></i>
       <div class="content">
         <div class="title"> Auto </div>
         <div class="description"> Escoje el auto que prefieras arrendar </div>
       </div>
     </div>
    <div class="disabled step">
      <i class="cart icon"></i>
      <div class="content">
        <div class="title"> Carrito </div>
        <div class="description"> Confirma el paquete y agregarlo al carrito </div>
      </div>
    </div>
    <div class="disabled step">
      <i class="payment icon"></i>
      <div class="content">
        <div class="title"> Realizar la compra </div>
        <div class="description"> Paga el paquete con tus fondos </div>
      </div>
    </div>
  </div>
</div>
<h1>Todos los Autos: </h1>
@if(isset($autos))
<div class="ui fluid container">
  <div class="ui segment">
    <h1 class="ui horizontal divider header">Autos encontrados: </h1>
    @if(count($autos) > 0)
    <div class="ui three stackable cards">
    @foreach($autos as $auto)
      <div class="ui fluid raised card">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios por dia: {{$auto->precio_por_dia}}
          </div>
          <div class="ui horizontal divider header">{{$auto->compañia}}: {{$auto->modelo_auto}}</div>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Ubicación del arriendo:</div>
            <div class="content">
              <ul>
                <li>País: {{$auto->pais_arriendo}}</li>
                <li>Ciudad: {{$auto->ciudad_arriendo}}</li>
                <li>Dirección: {{$auto->calle_arriendo}}</li>
              </ul>
            </div>
          </div>
          <div class="item">
            <div class="header">Descripción del auto: </div>
            <div class="content">
              {{$auto->descripcion_auto}}
            </div>
          </div>
          @if($auto->descuento > 0)
          <div class="item">
            <div class="header">Este auto tiene {{$auto->descuento}}% de descuento!!</div>
          </div>
          @endif
          <a href="../vuelo/auto/{{$auto->id_auto}}" class="ui bottom attached blue button">
          <i class="fas fa-search"></i>
          Seleccionar Auto
          </a>
        </div>
      </div>
    @endforeach
    </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$autos->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="javascript:history.back()" class="btn btn-primary" role="button"> Volver </a>
  @else
    <p>No se encontraron Autos!</p>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="javascript:history.back()" class="btn btn-primary" role="button"> Volver </a>
  @endif
</div>
</div>
@endif
@endsection
