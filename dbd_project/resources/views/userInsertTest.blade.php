<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{config('app.name', 'DBD Project')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 50vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
  </head>
  <body>
    <div class="flex-center position-ref full-height">
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
                 <td><input type="submit" name="submit" value="Ingresar"></td>

            </table>
        </form>
      </div>


  </body>
</html>
