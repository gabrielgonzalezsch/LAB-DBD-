@extends('layouts.app')
@section('content')
<div class="ui segment">
  <div class="ui header"> Lista de usuarios (para administración)</div>
  <div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Nombre usuario</th>
      <th>Roles</th>
      <th>Otorgar/Revocar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
    <tr>
      <td>{{$usuario->username}}</td>
      <td>{{$usuario->rol()}}</td>
      @if($usuario->esAdmin())
      <td>
        <button role="button" class="rev btn btn-danger"> Revocar privilegios </button>
      </td>
      @else
      <td>
        <button role="button" class="admin btn btn-primary"> Otorgar privilegios </button>
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<script>
  $('.admin').click(function(event){
    var usuario = event.target.parentElement.parentElement.firstElementChild.innerHTML;
    $.ajax({
      url: '/admin/otorgar',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {usuario: usuario, rol : 'administrador'},
      success: function(){
        alert('Privilegios otorgados');
        document.location.reload(false);
      },
      error: function(){
        alert('Error al entregar privilegios');
      }
    });
  });
  $('.rev').click(function(event){
    var usuario = event.target.parentElement.parentElement.firstElementChild.innerHTML;
    $.ajax({
      url: '/admin/revocar',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {usuario: usuario, rol : 'administrador'},
      success: function(){
        alert('Privilegios revocados');
        document.location.reload(false);
      },
      error: function(){
        alert('Error al revocar privilegios');
      }
    });
  });
</script>
@stop
