<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{config('app.name', 'DBD Project')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('../css/style.css') }}" />
  </head>
  <body>
    <header>
      <div clase="title-logo">
        <h1>Insertar administrador</h1>
      </div>
      <div class="loginTable">
        <form action="/insert" method="post">
            <table>
               <tr>
                 {{ csrf_field()}}
                 <td>Username: </td>
                 <td><input type="text" name="username" value="Ingrese nombre"></td>
               </tr>
               <tr>
                 <td>Password: </td>
                 <td><input type="text" name="password" value="Ingrese contraseña"></td>
               </tr>
               <tr>
                 <td>Email: </td>
                 <td><input type="text" name="email" value="Ingrese email"></td>
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
