@extends('layouts.app')
@section('content')
<script src="{{ asset('js/carrito.js') }}"></script>
<style>
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
#busqueda{
  width: 100%;
}
.centrado{
  width: 80%;
  margin: auto;
}
</style>
<center>
<div class="row">
<div id="busqueda">
  <div class="container">
      <div id="busqueda-row" class="row centrado">
          <div id="busqueda-column" class="col-md-12">
              <div id="busqueda-box" class="col-md-12">
                <h1 style="margin-top: 8px;" class="text-center text-info">Selecciona las fechas de arriendo</h1>
                <div class="form-row">
                <div class="form-group col-sm-12 col-md-6">
                  <label for="fecha_inicio" class="text-info">Fecha inicio arriendo:</label>
                  <input id="inicio" type="date" name="fecha_inicio" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                  <label for="fecha_fin" class="text-info">Fecha término arriendo:</label>
                  <input id="fin" type="date" name="fecha_fin" class="form-control">
                </div>
                </div>
                <div class="row">
                  <div class="col">
                    <button onclick="return checkDisponible()" class="btn btn-info btn-lg"> Elegir fecha</button>
                  </div>
                </div>
                <div id="disp" visibility="hidden" style="display: none;" class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Disponible!</h4>
                    El auto esta disponible, presione el boton comprar para continuar!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="alertFecha" visibility="hidden" style="display: none;" class="alert alert-warning" role="alert">
                  <h4 class="alert-heading">Fechas no válidas</h4>
                    Por favor ingrese la fecha de inicio y fin del arriendo correctamente
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="no-disp" visibility="hidden" style="display: none;" class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">No disponible!</h4>
                    @if(!empty($auto->fecha_inicio))
                    El auto no esta disponible, por favor elija otra fecha!. Actualmente está reservado entre {{$auto->inicio_arriendo}} y {{$auto->fin_arriendo}}
                    @else
                    El auto ya está reservado.
                    @endif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              </div>
            </div>
      </div>
    </div>
</div>
</div>
</center>
<div class="ui fluid container">
<div class="ui segment column ">
  <h1 class="ui header">Detalles del auto:
  <span id="auto">{{$auto->modelo}}</span></h1>
  <div class="content">

          <div style="padding: 5px; width: 100%;" class="ui huge orange ribbon label">
            Precios desde: ${{$auto->precio_por_dia}} por dia
          </div>
          <div class="ui star rating" data-rating="3"></div>
          <div class="ui horizontal divider header"><h1>{{$auto->modelo_auto}},{{$auto->compañia}}</div></h1>
          <div class="image">
            <center><img src="/images/{{$auto->compañia}}.png"  alt="Card image cap" style="width: 20%"></center>
          </div>
        </div>
    <ul>
      <dl><h4>  Valor diario de arriendo: {{$auto->precio_por_dia}} </h4></dl>
      <dl><h4>  Modelo: {{$auto->modelo_auto}} </h4></dl>
      <dl><h4>  Compañia: {{$auto->compañia}} </h4></dl>
      <dl><h4>  Patente: {{$auto->patente}} </h4></dl>
      <dl><h4>  Capacidad: {{$auto->cap_pasajeros}} </h4></dl>
      <dl><h4>  Descripcion: {{$auto->descripcion_auto}} </h4></dl>
    </ul>
    <div class="ui horizontal divider"><h5> Detalles de ubicación </h5></div>
    <ul>
      <dl><h4>  País: {{$auto->pais_arriendo}} </h4></dl>
      <dl><h4>  Ciudad: {{$auto->ciudad_arriendo}} </h4></dl>
      <dl><h4>  Dirección: {{$auto->calle_arriendo}} </h4></dl>
    </ul>   
    </div>
    <center>
    <a href="/autos" class="btn btn-info" role="button"> Volver a autos </a>
  </center>
  
</div>
</div>
<style>
  .ui.segment li{
    padding: 5px;
    margin-left: 10px;
  }
</style>
<script>
  function promptDelete(){
      var confirmacion = confirm('Esta seguro/a de eliminar este auto?');
      if(confirmacion){
        $.ajax({
          url: '/autos/{{$auto->id_auto}}/destroy',
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(){
            alert('Auto eliminado con éxito');
            window.location.replace('/autos');
          },
          error: function(){
            alert('Error al eliminar usuario');
          }
        });
      }else{
        alert("Entendido");
      }
      return false;
  }
  $('#num_dias').change(function(){
    var value = $('#num_dias').val() * {{$auto->precio_por_dia}};
    $('#total').html('$ '+value+' CLP');
  });

  function addCarrito(id_auto){
    var id = id_auto;
    var inicio = document.getElementById('inicio').value;
    var fin = document.getElementById('fin').value;
    //var num_dias = new Date(fin).getDate() - new Date(inicio).getDate();
    var dif = Math.abs(new Date(fin).getTime() - new Date(inicio).getTime());
    var num_dias = Math.ceil(dif / (1000 * 3600 * 24));
    var nombre = document.getElementById("auto").innerHTML;
    if(num_dias <= 0){
      document.getElementById('botonComprar').disabled = true;
      document.getElementById('alertFecha').style.display = "block";
    }else{
      document.getElementById('botonComprar').disabled = false;
      document.getElementById('alertFecha').style.display = "none";
      //if(checkDisponible() == true){
       addAutoAlCarrito(id, nombre, inicio, fin, num_dias);
      //}
    }
  }

  function checkDisponible(){
    var inicio = document.getElementById('inicio').value;
    var fin = document.getElementById('fin').value;
    if(!inicio || !fin){
      document.getElementById('botonComprar').disabled = true;
      document.getElementById('alertFecha').style.display = "block";
      return false;
    }else{
      document.getElementById('botonComprar').disabled = false;
      document.getElementById('alertFecha').style.display = "none";
    }
    $.ajax({
      url: '/autos/disponibilidad',
      data: { inicio: inicio, fin : fin, id_auto: "{{$auto->id_auto}}"},
      dataType: 'json',
      method: 'GET',
      success: function(disponible){
        var disp = document.getElementById('disp');
        var no_disp = document.getElementById('no-disp');
        if(disponible == 1){
          document.getElementById('botonComprar').disabled = false;
          disp.style.display = "block";
          no_disp.style.display = "none";
          return true;
        }else{
          document.getElementById('botonComprar').disabled = true;
          disp.style.display = "none";
          no_disp.style.display = "block";
          return false;
        }
      },
      error: function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
        return false;
      }
    });
  }
</script>
@endsection
