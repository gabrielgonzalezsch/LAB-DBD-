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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view('habitaciones.editar-habitacion')->with('habitacion', $habitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $hab = Habitacion::findOrFail($id);
      if(!empty($_POST['num_hab']))
        $hab->num_habitacion = $_POST['num_hab'];
      if(!empty($_POST['precio_por_noche']))
        $hab->precio_por_noche = $_POST['precio_por_noche'];
      $hab->ya_reservado = (!empty($_POST['ya_reservado'])) ? $_POST['ya_reservado'] : false;
      if(!empty($_POST['valoracion']))
        $hab->valoracion = $_POST['valoracion'];
      if(!empty($_POST['descripcion']))
        $hab->descripcion = $_POST['descripcion'];
      if(!empty($_POST['inc_desayuno']))
        $hab->incluye_desayuno = $_POST['inc_desayuno'];
      if(!empty($_POST['inc_aircon']))
        $hab->incluye_aire_acondicionado = $_POST['inc_aircon'];
      if(!empty($_POST['inc_servicio']))
        $hab->incluye_servicio = $_POST['inc_servicio'];
      if(!empty($_POST['num_camas_dob']))
        $hab->num_camas_dobles = $_POST['num_camas_dob'];
      if(!empty($_POST['num_camas_simp']))
        $hab->num_camas_simples = $_POST['num_camas_simp'];
      if(!empty($_POST['size']))
        $hab->room_size = $request->input('size');
      if(!empty($_POST['descuento']))
        $hab->descuento = $_POST['descuento'];
      $hab->updated_at = date('Y-m-d H:i:s');
      $hab->save();
      return redirect('/hoteles')->with('success', 'Habitación editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
