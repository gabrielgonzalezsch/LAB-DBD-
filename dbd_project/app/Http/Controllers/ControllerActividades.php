<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ControllerActividades extends Controller
{
    public function index(){
 		$actividad = Actividad::orderBy('id_actividad', 'asc')->paginate(5);
  		return view('actividad.buscar-actividad')->with('actividad', $actividad);
    }

    public function create(){
    	return view('actividad.crear-actividad');
    }

    public function store(Request $req){
    	$validData = $request->validate([
          'nombre_actividad' => 'required',
          'descripcion_actividad' => 'required',
          'fecha_inicio' => 'required',
          'fecha_termino' => 'required',
          'pais' => 'required',
          'ciudad' => 'required',
          'calle' => 'required',
          'valor_entrada' => 'required',
          'cupos' => 'required',
          'precio_normal' =>'required'
          'descuento' => 'required',
      ]);
    	$actividad = new Actividad();
    	$actividad->nombre_actividad = $request->input('nombre_actividad');
    	$actividad->descripcion_actividad = $request->input('descripcion_actividad');
    	$actividad->fecha_inicio = $request->input('fecha_inicio');
    	$actividad->fecha_termino = $request->input('fecha_termino');
    	$actividad->pais = $request->input('pais');
    	$actividad->ciudad = $request->input('ciudad');
    	$actividad->calle = $request->input('calle');
    	$actividad->valor_entrada = $request->input('valor_entrada');
    	$actividad->cupos = $request->input('cupos');
    	$actividad->precio_normal = $request->input('precio_normal');
    	$actividad->descuento = $request->input('descuento');
    	$hotel->save();
     	echo "Success!";
      	return redirect('/actividad')->with('success', 'Mostrando todos las actividades');
    }

    public function show($id){
    	try{
	        $actividad = Actividad::findOrFail($id);
	        return view('actvidad.detalle-actividad')->with('actividad', $actividad);
     	}
     	catch(Exception $e){
	        echo "Error";
	        return redirect('/actividad')->with('failure', 'actividad no existente');
        }
    }

    public function edit($id){
    	try{
    	$actividad = Actividad::findOrFail($id);
    	return view('actividad.modificar')->with('actividad',$actividad);
    	}
    	catch(Exception $e){
    	echo "Error objeto no encontrado";
    	}
    }

    public function update(Request $req,$id){
    	$actividad = Actividad::find($id);
    	$validData = $request->validate([
          'nombre_actividad' => 'required',
          'descripcion_actividad' => 'required',
          'fecha_inicio' => 'required',
          'fecha_termino' => 'required',
          'pais' => 'required',
          'ciudad' => 'required',
          'calle' => 'required',
          'valor_entrada' => 'required',
          'cupos' => 'required',
          'precio_normal' =>'required'
          'descuento' => 'required',
      ]);
    	$actividad = new Actividad();
    	$actividad->nombre_actividad = $request->input('nombre_actividad');
    	$actividad->descripcion_actividad = $request->input('descripcion_actividad');
    	$actividad->fecha_inicio = $request->input('fecha_inicio');
    	$actividad->fecha_termino = $request->input('fecha_termino');
    	$actividad->pais = $request->input('pais');
    	$actividad->ciudad = $request->input('ciudad');
    	$actividad->calle = $request->input('calle');
    	$actividad->valor_entrada = $request->input('valor_entrada');
    	$actividad->cupos = $request->input('cupos');
    	$actividad->precio_normal = $request->input('precio_normal');
    	$actividad->descuento = $request->input('descuento');
    	$hotel->save();
     	echo "Success!";
    }

    public function destroy($id){
    	try{
    		$actividad = Actividad::find($id);
    		$actividad->delete();
    	}
    }


}
