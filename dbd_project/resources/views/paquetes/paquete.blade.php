@extends('layouts.app')

@section('content')
<style>
  input[type='radio']{
    visibility: hidden;
  }
</style>
<div class="ui segment">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Paquetes para viajes</h1>
      <p class="lead">Escribe aca tu destino y elige el tipo de paquete que quieras comprar</p>
      <form id="formPaquete" action="#" method="get" onsubmit="return check()">
        @csrf
      <div class="ui relaxed grid">
      <div class="ui three column row">
        <div class="left floated column">
          <div class="ui card">
            <div class="content">
              <div class="header">
                Vuelo + Hotel
              </div>
            </div>
            <label class="ui bottom attached button">
            <input onclick="check()" type="radio" id="vueloHotel" name="tipo_paquete" value="1">
              <i class="search icon"></i>
              Elegir tu paquete!
            </input>
          </label>
          </div>
        </div>
        <div style="padding-left: 10%;" class="ui column">
          Elige el tipo de paquete
          <div class="row">
          <submit onclick="enviar()" id="enviar" type="submit" class="ui medium disabled blue button" form="formPaquete"> Proceder paquete </submit>
          </div>
        </div>
        <div class="right floated column">
          <div class="ui card">
            <div class="content">
              <div class="header">
                Vuelo + Auto
              </div>
            </div>
            <label class="ui bottom attached button">
            <input onclick="check()" type="radio" id="vueloAuto" name="tipo_paquete" value="2">
              <i class="search icon"></i>
                Elegir tu paquete!
            </input>
            </label>
          </div>
        </div>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>
@if(isset($vuelos) || isset($autos) || isset($hoteles))
   <div class="ui divider"></div>
   <div class="ui segment">
     <div class="ui four top attached steps">
       <div class="active step">
         <i class="plane icon"></i>
         <div class="content">
           <div class="title"> Buscar un vuelo </div>
           <div class="description"> Elige un vuelo a tu destino </div>
         </div>
       </div>
       <div class="disabled step">
         <i class="building icon"></i>
         <div class="content">
           <div class="title"> Hotel </div>
           <div class="description"> Escoje el hotel y habitación que prefieras </div>
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
@endif
@if(isset($vuelos))
<div class="ui fluid container">
  <div class="ui segment">
    <h1 class="ui horizontal divider header">Todos los vuelos: </h1>
    @if(count($vuelos) > 0)
    <div class="ui three stackable cards">
    @foreach($vuelos as $vuelo)
      <div class="ui fluid raised card">
        <div class="content">
          <div style="padding: 5px; width: 70%;" class="ui huge orange ribbon label">
            Precios desde: {{$vuelo->valor_turista}}
          </div>
          <div class="ui horizontal divider header">{{$vuelo->nombre_avion}}</div>
          <small>De {{$vuelo->aeropuerto_origen}} hasta {{$vuelo->aeropuerto_destino}} !!</small>
        </div>
        <div style="padding: 20px;" class="ui relaxed divided list">
          <div class="item">
            <div class="header">Dirección:</div>
            <div class="content">
              {{$vuelo->aeropuerto_origen}} >>>>>>>>> {{$vuelo->aeropuerto_destino}}
            </div>
          </div>
          <div class="item">
            <div class="header">Aereolinea</div>
            <div class="content">
              {{$vuelo->nombre_aerolinea}}
            </div>
          </div>
          @if($vuelo->descuento > 0)
          <div class="item">
            <div class="header">Este vuelo tiene {{$vuelo->descuento}}% de descuento!!</div>
          </div>
          @endif
          <a onclick="addVuelo({{$vuelo->id_vuelo}})" class="ui bottom attached blue button">
          <i class="fas fa-search"></i>
          Elegir este vuelo
          </a>
        </div>
      </div>
    @endforeach
    </div>
  <div style="left: 30%; width: 40%; overflow: auto;"class="ui segment">
    {{$vuelos->links()}}
  </div>
  <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @else
    <p>No se encontraron vuelos!</p>
    <a style="margin-left: 20px; margin-top: 20px; width: 100px;" href="/" class="btn btn-primary" role="button"> Volver </a>
  @endif
</div>
</div>
@endif
<script>
  function check(){
    var tipos = document.getElementsByName('tipo_paquete');
    var enviar = document.getElementById('enviar');
    if(tipos[0].checked){
      var tipo_paquete = tipos[0].value;
      tipos[0].parentElement.classList.add('green');
      tipos[1].parentElement.classList.remove('green');
    }else if(tipos[1].checked){
      var tipo_paquete = tipos[1].value;
      tipos[0].parentElement.classList.remove('green');
      tipos[1].parentElement.classList.add('green');
    }else{
      enviar.classList.add('disabled');
      return false;
    }
    enviar.classList.remove('disabled');
    return true;
  }

  function enviar(){
    if(check()){
      var tipo = $("input[type='radio'][name='tipo_paquete']:checked").val();
            document.getElementById('formPaquete').action = '/paquetes/'+tipo;
      document.getElementById('formPaquete').submit();
    }
  }

  // function agregarVuelo(id){
  //   var confirmar = confirm('Desea elegir este vuelo?');
  //   var id_paquete = 0;
  //   alert(id_paquete);
  //   if(confirmar){
  //     $.ajax({
  //       url: '/paquete/addVuelo',
  //       method: 'POST',
  //       data: {id_paquete: id_paquete, id_vuelo: id},
  //       success: function(){
  //
  //       },
  //       error: function(a,b,c){
  //         console.log(a);
  //         console.log(b);
  //         console.log(c);
  //       }
  //     });
  //   }
  // }
</script>
@endsection
