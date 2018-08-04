
<div id="navbar" class="row">
    <h2 style="margin: 5px !important; width: 20%; float: left;">
      <a id="logo" href="/">{{ config('app.name', 'DBD') }}</a>
    </h2>
    <ul tabindex="1" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i> Vuelos
        <i class="fas fa-plane"></i>
      </div>
      <div class="contenido-categoria">
      @if(!empty(Auth::user()))
        <a href="/vuelos/create"> Agregar vuelo</a>
      @endif
      <a href="/vuelos"> Ver vuelos</a>
      </div>
    </ul>
    <ul tabindex="2" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i> Autos
        <i class="fas fa-car"></i>
      </div>
      <div class="contenido-categoria">
        <a href="/autos/create"> Agregar auto</a>
        <a href="/autos"> Ver autos</a>
      </div>
    </ul>
    <ul tabindex="3" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i>Traslados
        <i class="fas fa-map-marker-alt"></i>
      </div>
      <div class="contenido-categoria">
        @if(!empty(Auth::user()))
          <a href="/cursos/create"> Agregar traslados</a>
        @endif
        <a href="/traslados"> Ver Traslados</a>
      </div>
    </ul>
    <ul tabindex="4" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i>Hoteles
        <i class="far fa-building"></i>
      </div>
      <div class="contenido-categoria">
        @if(Auth::check())
        <a href="/hoteles/create"> Agregar hoteles</a>
        @endif
        <a href="/hoteles"> Ver hoteles</a>
      </div>
    </ul>
   <ul tabindex="5" class="categoria">
     <div class="titulo-categoria"><i class="fas fa-sort-down"></i>Actividades
       <i class="far fa-calendar-alt"></i>
     </div>
     <div class="contenido-categoria">
       @if(!empty(Auth::check()))
        <a href="/actividades/create">Agregar actividad</a>
       @endif
       <a href="/actividades"> Ver actividades</a>
     </div>
    </ul>
    @if(Auth::check())
    <ul tabindex="7" class="categoria">
      <div class="titulo-categoria">{{ Auth::user()->username }}<i class="fas fa-sort-down"></i>
      </div>
      <div class="contenido-categoria">
        <a href="#"> Historial de compra</a>
        <a href="#"> Carrito de compra</a>
        @if(Auth::check())
        <a href="/admin"> Administración </a>
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
    <ul tabindex="7" class="categoria">
      <div class="titulo-categoria"> <i class="fas fa-sort-down"></i>Ingresar al sitio
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
        font-size: calc(9px + (16 - 9) * ((100vw - 300px) / (1600 - 300)));
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
        float: right !important;
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
