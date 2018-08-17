@extends('layouts.app')
@section('content')
  <h1>Agrega fondos para probar la página</h1>
  <form action="{{ route('fondos') }}" method="post">
    {{ csrf_field() }}
  <input type="text" value="0" placeholder="Ingresa un valor..." name="fondos"/>
  <button href="/fondos"></button>
  <input type="submit" value="Ganar plata">
  </form>
@endsection
