<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hoteles;

class ControllerHoteles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $hoteles = Hoteles::orderBy('ID_hotel', 'asc')->paginate(5); //Cambiar a ordenarlos segun criterios
      return view('hoteles.buscar-hoteles')->with('hoteles', $hoteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hoteles.insertar-hotel');
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
          'n_hotel' => 'required',
          'pais' => 'required',
          'ciudad' => 'required',
          'dir' => 'required|unique:hoteles',
      ]);

      $hotel = new Hoteles();
      $hotel->nombre_hotel = $request->input('n_hotel');
      $hotel->pais = $request->input('pais');
      $hotel->ciudad = $request->input('ciudad');
      $hotel->direccion = $request->input('dir');
      $hotel->valoracion = 0.0;
      $hotel->latitud = 0;  //USAR GOOGLE API PARA OBTENER LATITUD Y LONGITUD
      $hotel->longitud = 0;
      $hotel->created_at = date('Y-m-d H:i:s');
      $hotel->updated_at = date('Y-m-d H:i:s');
      $hotel->save();
      echo "Success!";
      return redirect('/hoteles')->with('success', 'Mostrando todos los hoteles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      try{
          $hotel = Hoteles::findOrFail($id);
        return view('hoteles.detalle-hotel')->with('hotel', $hotel);
      }catch(Exception $e){
        echo "Error";
        return redirect('/hoteles')->with('failure', 'Hotel no existente');
      }
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
