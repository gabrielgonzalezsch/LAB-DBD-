@extends('layouts.app')
@section('content')
  <h1>Agrega fondos para probar la página</h1>
  <form>
  <input type="text" value="0" placeholder="Ingresa un valor..." name="fondos"/>
  <button href="/fondos"></button>
  <input type="submit" value="Submit">
  </form>
@endsection
