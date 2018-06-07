<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{config('app.name', 'DBD Project')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('../css/style.css') }}" />
  </head>
  <body>
    <header>
      <div clase="title-logo">
        <h1>Insertar Vuelos</h1>
      </div>
      <div class="loginTable">
        <form action="/vuelos" method="post">
            <table>
               <tr>
                 {{ csrf_field()}}
                 <td>Nombre del avión: </td>
                 <td><input type="text" name="n_avion" value=""></td>
               </tr>
               <tr>
                 <td>Aeropuerto origen: </td>
                 <td><input type="text" name="a_origen" value=""></td>
               </tr>
               <tr>
                 <td>Aeropuerto destino: </td>
                 <td><input type="text" name="a_destino" value=""></td>
               </tr>
               <tr>
                 <td>Hora salida: </td><td><input type="text" name="h_salida" value=""></td>
                  <td>Hora llegada: </td><td><input type="text" name="h_llegada" value=""></td>
               </tr>
               <tr>
                 <td>Fecha salida: </td> <td><input type="text" name="f_salida" value=""></td>
                  <td>Fecha llegada: </td> <td><input type="text" name="f_llegada" value=""></td>
               </tr>
               <tr>
                   <td>Capacidad equipaje: </td> <td><input type="text" name="c_equipaje" value=""></td>
               </tr>
               <tr>
                    <td>Capacidad turistas: </td> <td><input type="text" name="c_turista" value=""></td>
                    <td>Capacidad ejecutivo: </td> <td><input type="text" name="c_ejecutivo" value=""></td>
                    <td>Capacidad primera clase: </td> <td><input type="text" name="c_primera_clase" value=""></td>
               </tr>
               <tr>
                    <td>Precio turistas: </td> <td><input type="text" name="p_turista" value=""></td>
                    <td>Precio ejecutivo: </td> <td><input type="text" name="p_ejecutivo" value=""></td>
                    <td>Precio primera clase: </td> <td><input type="text" name="p_primera_clase" value=""></td>
               </tr>
               <tr>
                  <td>Descuento: </td><td><input type="text" name="descuento" value=""></td>
               </tr>
                 <td><input type="submit" name="submit" value="Ingresar">
                 <a href="/" class="button" role="button"> Volver </a>
                 </td>
            </table>
        </form>
      </div>

      </header>
  </body>
</html>
