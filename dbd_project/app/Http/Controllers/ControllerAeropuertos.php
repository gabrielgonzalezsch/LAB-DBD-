<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeropuertos;

class ControllerAeropuertos extends Controller
{
    
    public function index(){
    	$aeropuertos = Aeropuertos::orderBy('id_auto', 'asc')->paginate(5); 
      return view('aeropuertos.buscar-aeropuertos')->with('aeropuertos', $aeropuertos);
    }
    public function create(){
    	return view('aeropuertos.insertar-aeropuerto');
    }
    public function store(Request $request){
    	$validData = $request->validate([
        'pais' => 'required|string',
        'ciudad' => 'required|string',
        'longitud' => 'required|float',
        'latitud' => 'requiered|float',

    ]);

    $aeropuerto = new Aeropuertos();
    $auto->pais = $request->input('pais');
    $auto->ciudad = $request->input('ciudad');
    $auto->longitud = $request->input('longitud');
    $auto->latitud = $request->input('latitud');
    $aeropuerto->save();
    echo "Success!";
    return redirect('/aeropuertos')->with('success', 'Mostrando aeropuertos disponibles');
    }


    public function show($id){
    	try{
	    	$aeropuerto = Aeropuertos::::find($id);
	    	return view('aeropuertos.detalles')->with('aeropuerto',$aeropuerto);
    	}
    	catch(Exception $e){
        echo "Error";
        return redirect('/aeropuertos')->with('failure', 'aeropuerto no existente');
      }
    }
    public function update($request , $id){
    	
    }

    public function destroy($id){
    	$aeroperto = Aeropuertos::find($id);
    	aeropuerto->delete();
    }
}
