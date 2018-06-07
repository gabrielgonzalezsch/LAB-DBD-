<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>DBD Homepage!</title>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('../css/style.css') }}">
    </head>
    <body>
        <header>
          <div class="title-logo">
              <h1>Proyecto DBD</h1>
          </div>
            <div class="navigator">
                <ul>
                  <li><a href="#"> Log in </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar usuario normal</a>
                        <a href="/admin"> Agregar administrador</a>
                        <a href="#"> Agregar usuario guest</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Vuelos </a>
                    <ul>
                      <li>
                        <a href="/insertar-vuelos"> Agregar vuelo</a>
                        <a href="/vuelos"> Ver vuelos</a>
                        <a href="#"> Buscar vuelos</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Autos </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar autos</a>
                        <a href="#"> Ver autos</a>
                        <a href="#"> Buscar autos</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Traslados </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar traslados</a>
                        <a href="#"> Ver traslados</a>
                        <a href="#"> Buscar traslados</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Hoteles </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar hoteles</a>
                        <a href="#"> Ver hoteles</a>
                        <a href="#"> Buscar hoteles</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Habitaciones </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar Habitaciones</a>
                        <a href="#"> Ver Habitaciones</a>
                        <a href="#"> Buscar Habitaciones</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Actividades </a>
                    <ul>
                      <li>
                        <a href="#"> Agregar actividades</a>
                        <a href="#"> Ver actividades</a>
                        <a href="#"> Buscar actividades</a>
                      </li>
                    </ul>
                  </li>
                </ul>
            </div>
        </header>
    </body>
</html>
