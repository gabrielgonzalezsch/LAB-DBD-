<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class ControllerUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validData = $request->validate([
          'username' => 'bail|required|unique:usuarios|max:30',
          'email' => 'required|email|unique:usuarios,email',
          'pass' => 'required|same:confirm-pass',
          'confirm-pass' => 'required|min:6'
      ]);

      $usuario = new Usuarios();
      $usuario->tipo_usuario = 'registrado';
      $usuario->username = $request->input('username');
      $usuario->password = $request->input('pass');
      $usuario->email = $request->input('email');
      $usuario->numero_cuenta_usuario = NULL;
      $usuario->banco_origen = NULL;
      $usuario->fondos_disponibles = 0;
      $usuario->created_at = date('Y-m-d H:i:s');
      $usuario->updated_at = date('Y-m-d H:i:s');
      $usuario->save();
      echo "Success!";
      return redirect('/vuelos')->with('success', 'Registrado exitosamente, mostrando vuelos disponibles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
