@extends('layouts.app')
@section('content')
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
                  <li><a href="#"> Vuelos </a>
                    <ul>
                      <li>
                        @if(Auth::check())
                        <a href="/vuelos/create"> Agregar vuelo</a>
                        @endif
                        <a href="/vuelos"> Ver vuelos</a>
                        <a href="#"> Buscar vuelos</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#"> Autos </a>
                    <ul>
                      <li>
                        @if(Auth::check())
                        <a href="/autos/create"> Agregar autos</a>
                        @endif
                        <a href="/autos"> Ver autos</a>
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
                        @if(Auth::check())
                        <a href="/hoteles/create"> Agregar hoteles</a>
                        @endif
                        <a href="/hoteles"> Ver hoteles</a>
                        <a href="#"> Buscar hoteles</a>
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
@endsection
