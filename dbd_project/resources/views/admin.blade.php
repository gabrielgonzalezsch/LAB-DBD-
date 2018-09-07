@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
    <h1>Lista de usuarios (para administración)</h1>
    <p></p>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Tabla de usuarios</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th class="hidden-xs">Id</th>
                        <th>Nombre usuario</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Otorgar/Revocar Rol <em class="fa fa-cog"></em></th>
                        <th>Eliminar usuario</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                      <td class="hidden-xs">{{$usuario->id_usuario}}</td>
                      <td>{{$usuario->username}}</td>
                      <td>{{$usuario->email}}</td>
                      <td>{{$usuario->rol()}}</td>
                      @if($usuario->esAdmin())
                      <td align="center">
                        <a onclick="revocar({{$usuario->id_usuario}})" class="btn btn-danger">Revocar Admin</a>
                      </td>
                      @else
                      <td align="center">
                        <a onclick="otorgar({{$usuario->id_usuario}})" class="btn btn-primary">Otorgar Admin</a>
                      </td>
                      @endif
                      <td align="center">
                        <a onclick="eliminar({{$usuario->id_usuario}})" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
              <div class="panel-footer">
                <div class="row">
                </div>
              </div>
            </div>

      </div>
   </div>
</div>
<script>
  function otorgar(id){
    var confirmacion = confirm('Esta seguro/a de otorgarle privilegios de administrador?');
    if(confirmacion){
    $.ajax({
      url: '/admin/otorgar',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {usuario: id, rol : 'administrador'},
      success: function(){
        alert('Privilegios otorgados');
        document.location.reload(false);
      },
      error: function(){
        alert('Error al entregar privilegios');
      }
    });
  }else{
    alert('Entendido');
  }
  return false;
  }

  function revocar(id){
    var confirmacion = confirm('Esta seguro/a de revocar los privilegios?');
    if(confirmacion){
      $.ajax({
        url: '/admin/revocar',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {usuario: id, rol : 'administrador'},
        success: function(){
          alert('Privilegios revocados');
          document.location.reload(false);
        },
        error: function(){
          alert('Error al revocar privilegios');
        }
      });
    }else{
      alert("Entendido");
    }
    return false;
  }

  function eliminar(id){
    var confirmacion = confirm('Esta seguro/a de eliminar este usuario?');
    if(confirmacion){
      $.ajax({
        url: '/usuarios/'+id+'/destroy',
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
          alert('Usuario eliminado con éxito');
          document.location.reload(false);
        },
        error: function(){
          alert('Error al eliminar usuario');
        }
      });
    }else{
      alert("Entendido");
    }
    return false;
  }
</script>
@stop
