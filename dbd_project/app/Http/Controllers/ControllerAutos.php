<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class ControllerAutos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $autos = Auto::orderBy('id_auto', 'asc')->paginate(5); //Cambiar a ordenarlos segun criterios
      return view('autos.buscar-autos')->with('autos', $autos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autos.insertar-auto');
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
          'mod-auto' => 'required|alpha_num',
          'comp' => 'required|alpha_num',
          'pat' => 'required|alpha_num',
          'pais-arr' => 'required|string',
          'ciudad-arr' => 'required|string',
          'calle-arr' => 'required|string',
          'precio-por-dia' => 'required|numeric',
          'descuento' => 'required|numeric',
          'cap-pasajeros' => 'required|digits_between:0,100',
      ]);

      $auto = new Auto();
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
      return redirect('/autos')->with('success', 'Mostrando autos disponibles');
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
        $auto = Auto::find($id);
        return view('autos.detalle-auto')->with('auto', $auto);
      }
      catch(Exception $e){
        echo "Error";
        return redirect('/actividades')->with('failure','auto no existente');
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
          $auto = Auto::find($id);
          return view('autos.modificar-auto')->with('auto', $auto);
        }
        catch(Exception $e){
          echo "Error, auto no encontrado";
        }
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
      try{
      $auto = Auto::find($id);
      $validData = $request->validate([
          'mod-auto' => 'required|alpha_num',
          'comp' => 'required|alpha_num',
          'pat' => 'required|alpha_num',
          'pais-arr' => 'required|string',
          'ciudad-arr' => 'required|string',
          'calle-arr' => 'required|string',
          'precio-por-dia' => 'required|numeric',
          'descuento' => 'required|numeric',
          'cap-pasajeros' => 'required|digits_between:0,100',
      ]);
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
      $auto->updated_at = date('Y-m-d H:i:s');
      $auto->save();
      echo "Success!";
      return redirect("/autos/".$id)->with('success', 'Auto editado con éxito');
      }catch(Exception $e){
        return redirect("/autos/".$id)->with('failure', 'Error al editar el auto');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        $auto = Auto::find($id);
        $auto->delete();
        return redirect("/autos")->with('success', 'Auto eliminado con éxito');
      }catch(Exception $e){
        return redirect("/autos/".$id)->with('success', 'Error al eliminar auto');
      }
    }
}
