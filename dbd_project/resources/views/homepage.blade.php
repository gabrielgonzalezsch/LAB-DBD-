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
            <div class="row">
                <ul class="main_navigator">
                  <li><a href="/admin"> Log in </a> </li>
                  <li><a href="/vuelo"> Insertar vuelos </a> </li>
                  <li><a href=""> Insertar autos </a> </li>
                  <li><a href=""> Insertar traslados </a> </li>
                  <li><a href=""> Insertar usuarios (admin) </a> </li>
                  <li><a href=""> Insertar hoteles </a> </li>
                  <li><a href=""> Insertar habitaciones </a> </li>
                </ul>
            </div>
        </header>
    </body>
</html>
