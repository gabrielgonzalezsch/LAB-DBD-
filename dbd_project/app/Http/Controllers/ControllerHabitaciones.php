<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ControllerHabitaciones extends Controller
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
    public function create($id_hotel)
    {
      try{
          $found = Hotel::findOrFail($id_hotel);
          return view('habitaciones.insertar-habitacion')->with('id_hotel', $id_hotel);
      }catch(Exception $e){
        //echo "Error, hotel no encontrado";
        //dd($e);
        return redirect('/hoteles')->with('failure', 'Hotel no encontrado');
      }
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
          'num_hab' => 'required|unique:hoteles,id_hotel',
          'precio' => 'required|numeric',
          'descripcion' => 'required',
          'num_camas_simp' => 'required|numeric',
          'num_camas_dob' => 'required|numeric',
          'size' => 'required|numeric',
      ]);
      try{
      $hab = new Habitacion();
      $hab->id_hotel = $request->input('id_hotel');
      $hab->num_habitacion = $request->input('num_hab');
      $hab->precio_por_noche = $request->input('precio');
      $hab->ya_reservado = false;
      $hab->valoracion = 0;
      $hab->descripcion = $request->input('descripcion');
      $hab->tag_habitacion = NULL;
      $hab->incluye_desayuno = $request->input('inc_desayuno');
      $hab->incluye_aire_acondicionado = $request->input('inc_aircon');
      $hab->incluye_servicio = $request->input('inc_servicio');
      $hab->num_camas_dobles = $request->input('num_camas_dob');
      $hab->num_camas_simples = $request->input('num_camas_simp');
      $hab->room_size = $request->input('size');
      $hab->descuento = 0;
      $hab->created_at = date('Y-m-d H:i:s');
      $hab->updated_at = date('Y-m-d H:i:s');
      $hab->save();
      return redirect('/hoteles')->with('success', 'Habitación agregada');
      }catch(Exception $e){
        echo $e;
        dd($e);
        return redirect('/hoteles')->with('failure', 'Ha ocurrido un error');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Habitaciones $habitaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitaciones $habitaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitaciones $habitaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitaciones $habitaciones)
    {
        //
    }
}
