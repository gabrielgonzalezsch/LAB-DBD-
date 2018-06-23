<!--Esto es un intento de barra de navegacion vertical, pero mejor ocupar la horizontal (navbar)-->
<div class="sidenav-left">
      <div class="cat-container">
        <li class="category"> Vuelos</li><span id="icon-vuelo"></span>
        <ul class="dropdown">
          @if(Auth::check())
          <li><a href="/vuelos/create"> Agregar vuelo</a></li>
          @endif
          <li><a href="/vuelos"> Ver vuelos</a></li>
          <li><a href="#"> Buscar vuelos</a></li>
        </ul>
    </div>
    <div class="cat-container">
      <li class="category"> Autos</li>
        <ul class="dropdown">
          @if(Auth::check())
          <li><a href="/autos/create"> Agregar autos</a></li>
          @endif
          <li><a href="/autos"> Ver autos</a></li>
          <li><a href="#"> Buscar autos</a></li>
       </ul>
    </div>
    <div class="cat-container">
      <li class="category"> Traslados</li>
        <ul class="dropdown">
          <li><a href="#"> Agregar traslados</a></li>
          <li><a href="#"> Ver traslados</a></li>
          <li><a href="#"> Buscar traslados</a></li>
        </ul>
    </div>
    <div class="cat-container">
     <li class="category"> Hoteles</li>
        <ul class="dropdown">
          @if(Auth::check())
          <li><a href="/hoteles/create"> Agregar hoteles</a></li>
          @endif
          <li><a href="/hoteles"> Ver hoteles</a></li>
          <li><a href="#"> Buscar hoteles</a></li>
        </ul>
     </div>
     <div class="cat-container">
      <li class="category"> Actividades</li>
        <ul class="dropdown">
          <li><a href="#"> Agregar actividades</a></li>
          <li><a href="#"> Ver actividades</a></li>
          <li><a href="#"> Buscar actividades</a></li>
        </ul>
    </div>
    </div>
</div>
