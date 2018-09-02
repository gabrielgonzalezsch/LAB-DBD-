
<div id="navbar" class="row">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <h2 style="margin: 10px !important; width: 20%; float: left;">
      <a id="logo" href="/"><i class="material-icons">&#xe905;</i> {{ config('app.name', 'DBD') }}</a>
    </h2>
    <ul tabindex="1" class="categoria">
      <div class="titulo-categoria"> <i class="angle down icon"></i> Vuelos
        <i class="plane icon"></i>
      </div>
      <div class="contenido-categoria">
      @if(!empty(Auth::user()))
        <a href="/vuelos/create"> Agregar vuelo</a>
      @endif
      <a href="/vuelos"> Ver vuelos</a>
      </div>
    </ul>
    <ul tabindex="4" class="categoria">
      <div class="titulo-categoria"> <i class="angle down icon"></i>Hoteles
        <i class="building icon"></i>
      </div>
      <div class="contenido-categoria">
        @if(Auth::check())
        <a href="/hoteles/create"> Agregar hoteles</a>
        @endif
        <a href="/hoteles"> Ver hoteles</a>
      </div>
    </ul>
    <ul tabindex="2" class="categoria">
      <div class="titulo-categoria"> <i class="angle down icon"></i> Autos
        <i class="car icon"></i>
      </div>
      <div class="contenido-categoria">
        <a href="/autos/create"> Agregar auto</a>
        <a href="/autos"> Ver autos</a>
      </div>
    </ul>
    <ul tabindex="3" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i>Solicitar Traslado
        <i class="fas fa-map-marker-alt"></i>
      </div>
      <div class="contenido-categoria">
        @if(!empty(Auth::user()))
          <a href="/traslados/create_aeropuerto_a_hotel">Aeropuerto a Hotel</a>
        @endif
        <a href="/traslados/create_hotel_a_aeropuerto">Hotel a Aeropuerto</a>
      </div>
    </ul>
   <ul tabindex="5" class="categoria">
     <div class="titulo-categoria"><i class="angle down icon"></i>Actividades <i class="calendar alternate outline icon"> </i>
     </div>
     <div class="contenido-categoria">
       @if(!empty(Auth::check()))
        <a href="/actividades/create">Agregar actividad</a>
       @endif
       <a href="/actividades"> Ver actividades</a>
     </div>
    </ul>
    <ul tabindex="6" class="categoria">
      <div class="titulo-categoria"><i class="angle down icon"></i>Paquetes <i class="package icon"> </i>
      </div>
      <div class="contenido-categoria">
        <a href="/paquetes"> Ver paquete</a>
      </div>
     </ul>
    @if(Auth::check())
    <ul tabindex="7" class="categoria">
      <div class="titulo-categoria"><i class="angle down icon"></i>{{ Auth::user()->username }}<i class="user icon"></i>
      </div>
      <div class="contenido-categoria">
        <a href="/historial"> Historial de compra</a>
        <a href="/carrito"> Carrito de compra</a>
        @if(Auth::check())
        <a href="/admin"> Administración </a>
        <a href="/auditoria"> Auditoría </a>
        @endif
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Salir') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
      </div>
    </ul>
    @else
    <ul tabindex="8" class="categoria">
      <div class="titulo-categoria"> <i class="angle down icon"></i>Acceso <i class="fas fa-user"></i>
      </div>
      <div class="contenido-categoria">
        <a href="/login"> Ingresar</a>
        <a href="/register"> Registrarse</a>
      </div>
    </ul>
    @endif
    <div class="menu-wrapper">
      <i class="bars icon"> Menú</i>
    </div>
</div>
<style>
  @media only screen and (min-width: 1030px) {
      .categoria{
        display: block;
        width: calc(30px + (170 - 30) * ((100vw - 300px) / (1600 - 300)));
      }
      .titulo-categoria{
        font-size: calc(8px + (16 - 9) * ((100vw - 300px) / (1600 - 300)));
      }
      .menu-wrapper{
        display: none;
      }
  }
  @media only screen and (max-width: 1030px) {
      #navbar .categoria{
        display: none;
      }
      .menu-wrapper{
        display: block !important;
      }
  }

  .menu-wrapper{
    display: none;
    font-size: 16px;
    margin: 10px 30px 0px 0px;
    max-width: 50px;
  }
  .categoria i{
    margin-top: -10px;
    padding-top: 0;
  }

</style>
