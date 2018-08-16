<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traslado;

class ControllerTraslados extends Controller{
    public function index(){
    	$traslados = Traslado::orderBy('id_traslado','asc')->paginate(10);
    	return view('traslado.mostrar-traslados')->with('traslados', $traslados);
  	}

  	public function create(){
    	return view('traslado.insertar-traslado');
  	}

	public function store(Request $request){
	    $validData = $request->validate([
			     'tipo_vehiculo' => 'required',
          	'patente' => 'required',
          	'pais' => 'required',
          	'ciudad' => 'required',
          	'inicio_servicio' => 'required',
          	'fin_servicio' => 'required',
          	'numero_pasajeros' => 'required',
          	'tarifa_por_kilometro' => 'required'
      		]);
      	$traslado = new Traslado();
      	$traslado -> tipo_vehiculo = $request->input('tipo_vehiculo');
      	$traslado -> patente = $request->input('patente');
      	$traslado -> pais = $request->input('pais');
      	$traslado -> ciudad = $request->input('ciudad');
      	$traslado -> inicio_servicio = $request->input('inicio_servicio');
      	$traslado -> fin_servicio = $request->input('fin_servicio');
      	$traslado -> numero_pasajeros = $request->input('numero_pasajeros');
      	$traslado -> tarifa_por_kilometro = $request->input('tarifa_por_kilometro');
      	$traslado -> descuento = 0;
      	$traslado->created_at = date('Y-m-d H:i:s');
      	$traslado->updated_at = date('Y-m-d H:i:s');
      	$traslado->save();
      	echo "Success!";
      	return redirect('/traslados')->with('success', 'Mostrando todos los traslados');
    	}

  	public function show($id){
	    try{
        	$traslado = Traslado::findOrFail($id);
        	return view('traslados.mostrar-traslados')->with('traslado', $traslado);
      	}
      	catch(Exception $e){
        	echo "Error";
        	return redirect('/traslados')->with('failure', 'Traslado no existente');
      	}
  	}

  	public function edit($id){
  		try{
  			$traslado = Traslado::findOrFail($id);
  			return view('traslado.modificar')->with('Traslado',$traslado);
  		}
  		catch(Exception $e){
  			echo "Error"
  			return redirect('/traslado')->with('failure','Traslado no existente');
  		}
	}

  	public function update(Request $request, $id){
  		$validData = $request->validate([
			'tipo_vehiculo' => 'required',
          	'patente' => 'required',
          	'pais' => 'required',
          	'ciudad' => 'required',
          	'inicio_servicio' => 'required',
          	'fin_servicio' => 'required',
          	'numero_pasajeros' => 'required',
          	'tarifa_por_kilometro' => 'required',
          	'descuento' => 'required'
      		]);
      	$traslado = new Traslado();
      	$traslado -> tipo_vehiculo = $request->input('tipo_vehiculo');
      	$traslado -> patente = $request->input('patente');
      	$traslado -> pais = $request->input('pais');
      	$traslado -> ciudad = $request->input('ciudad');
      	$traslado -> inicio_servicio = $request->input('inicio_servicio');
      	$traslado -> fin_servicio = $request->input('fin_servicio');
      	$traslado -> numero_pasajeros = $request->input('numero_pasajeros');
      	$traslado -> tarifa_por_kilometro = $request->input('tarifa_por_kilometro');
      	$traslado -> descuento = $request->input('descuento');
      	$traslado->updated_at = date('Y-m-d H:i:s');
      	$traslado->save();
      	echo "Success!";
  	}

  	public function destroy($id){
  		$traslado = Traslado::find($id);
    	$traslado->delete();
  	}
}
