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
      $autos = Hoteles::orderBy('precio_min_habitacion', 'asc')->paginate(5); //Cambiar a ordenarlos segun criterios
      return view('hoteles.buscar-hoteles')->with('hoteles', $hoteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('hoteles.insertar-hotel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*$validData = $request->validate([
          'tipo-auto' => 'required|alpha_num',
          'mod-auto' => 'required|alpha_num',
          'comp' => 'required|alpha_num',
          'pat' => 'required|alpha_num',
          'pais-arr' => 'required|string',
          'ciudad-arr' => 'required|string',
          'calle-arr' => 'required|string',
          'precio-por-dia' => 'required|numeric',
          'descuento' => 'required',
          'cap-pasajeros' => 'required|digits_between:0,100',
      ]);

      $auto = new Autos();
      $auto->tipo_vehiculo = $request->input('tipo-auto');
      $auto->modelo_auto = $request->input('mod-auto');
      $auto->compañia = $request->input('comp');
      $auto->patente = $request->input('pat');
      $auto->pais_arriendo = $request->input('pais-arr');
      $auto->ciudad_arriendo = $request->input('ciudad-arr');
      $auto->calle_arriendo = $request->input('calle-arr');
      $auto->precio_por_dia = $request->input('precio-por-dia');
      $auto->cap_pasajeros = $request->input('cap-pasajeros');
      $auto->descripcion_auto = $request->input('desc-auto');
      $auto->descuento = $request->input('descuento');
      $auto->created_at = date('Y-m-d H:i:s');
      $auto->updated_at = date('Y-m-d H:i:s');
      $auto->save();
      echo "Success!";
      return redirect('/autos')->with('success', 'Mostrando autos disponibles');*/
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
