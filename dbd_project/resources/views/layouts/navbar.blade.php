<style>
  .col .i{
    margin-left: 5px;
    margin-right: 5px;
    padding: 10px;
  };
</style>
<div class="navigation">
    <ul id="navbar" class="row">
      <a id="title" class="col-2" href="/">{{ config('app.name', 'DBD') }}</a>
      <ul class="col"> <i class="fas fa-sort-down"></i> Vuelos <i class="fas fa-plane"></i>
        @if(Auth::check())
        <li><a href="/vuelos/create"> Agregar vuelo</a></li>
        @endif
        <li><a href="/vuelos"> Ver vuelos</a></li>
        <li><a href="#"> Buscar vuelos</a></li>
      </ul>
      <ul class="col"> <i class="fas fa-sort-down"></i> Autos <i class="fas fa-car"></i>
        @if(Auth::check())
        <li><a href="/autos/create"> Agregar autos</a></li>
        @endif
        <li><a href="/autos"> Ver autos</a></li>
        <li><a href="#"> Buscar autos</a></li>
      </ul>
      <ul class="col"> <i class="fas fa-sort-down"></i> Traslados <i class="fas fa-map-marker-alt"></i>
        @if(Auth::check())
        <li><a href="#"> Agregar traslados</a></li>
        @endif
        <li><a href="#"> Ver traslados</a></li>
        <li><a href="#"> Buscar traslados</a></li>
      </ul>
    <ul class="col"> <i class="fas fa-sort-down"></i> Hoteles <i class="far fa-building"></i>
      @if(Auth::check())
      <li><a href="/hoteles/create"> Agregar hoteles</a></li>
      @endif
      <li><a href="/hoteles"> Ver hoteles</a></li>
      <li><a href="#"> Buscar hoteles</a></li>
    </ul>
    <ul class="col"> <i class="fas fa-sort-down"></i> Actividades <i class="far fa-calendar-alt"></i>
      @if(Auth::check())
      <li><a href="#"> Agregar actividades</a></li>
      @endif
      <li><a href="#"> Ver actividades</a></li>
      <li><a href="#"> Buscar actividades</a></li>
    </ul>
    @if(Auth::check())
    <ul class="col"> <i class="fas fa-sort-down"></i> {{ Auth::user()->username }}  <i class="far fa-user"></i>
      <li><a href="#"> Historial de compra</a></li>
      <li><a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Salir') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </li>
    </ul>
    @else
    <ul class="col"> <i class="fas fa-sort-down"></i> Ingresar al sitio <i class="far fa-user"></i>
      <li><a href="/login"> Ingresar</a></li>
      <li><a href="/register"> Registrarse</a></li>
    </ul>
    @endif
  </ul>
</div>
