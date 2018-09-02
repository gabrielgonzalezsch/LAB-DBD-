<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ControllerActividades extends Controller{
	
	public function index(){
		$actividades = Actividad::orderBy('id_actividad', 'asc')->paginate(5);
		return view('actividades.buscar-actividad')->with('actividades', $actividades);
	}

	public function create(){
		return view('actividades.insertar-actividad');
	}

	public function store(Request $request){
		$validData = $request->validate([
			'nombre_actividad' => 'required|string',
			'descripcion_actividad' => 'required',
			'fecha_inicio' => 'required|date(Y-m-d)',
			'fecha_termino' => 'required|date(Y-m-d)',
			'pais' => 'required|string',
			'ciudad' => 'required|string',
			'calle' => 'required|string',
			'valor_entrada' => 'required|numeric',
			'cupos' => 'required|numeric',
			'descuento' => 'required|numeric',
		]);
		$actividad = new Actividad();
		$actividad->nombre_actividad = $request->input('nombre_actividad');
		$actividad->descripcion_actividad = $request->input('descripcion_actividad');
		$actividad->fecha_inicio = $request->input('fecha_inicio');
		$actividad->fecha_fin = $request->input('fecha_termino');
		$actividad->pais = $request->input('pais');
		$actividad->ciudad = $request->input('ciudad');
		$actividad->calle = $request->input('calle');
		$actividad->valor_entrada = $request->input('valor_entrada');
		$actividad->cupos = $request->input('cupos');
		$actividad->descuento = $request->input('descuento');
		$actividad->created_at = date('Y-m-d H:i:s');
		$actividad->updated_at = date('Y-m-d H:i:s');
		$actividad->save();
		echo "Success!";
		return redirect('/actividades')->with('success', 'Mostrando actividades disponibles');
	}

	public function show($id){
		try{
			$actividad = Actividad::find($id);
			return view('actividades.detalle-actividad')->with('actividad', $actividad);
		}
		catch(Exception $e){
			echo "Error";
			return redirect('/actividades')->with('failure', 'actividad no existente');
		}
	}

	public function edit($id){
		try{
			$actividad = Actividad::find($id);
			return view('actividades.modificar-actividad')->with('actividad',$actividad);
		}
		catch(Exception $e){
			echo "Error, actividad no encontrada";
		}
	}

	public function update(Request $req,$id){
		try{
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
				'descuento' => 'required'
				]);
			$actividad->nombre_actividad = $request->input('nombre_actividad');
			$actividad->descripcion_actividad = $request->input('descripcion_actividad');
			$actividad->fecha_inicio = $request->input('fecha_inicio');
			$actividad->fecha_fin = $request->input('fecha_termino');
			$actividad->pais = $request->input('pais');
			$actividad->ciudad = $request->input('ciudad');
			$actividad->calle = $request->input('calle');
			$actividad->valor_entrada = $request->input('valor_entrada');
			$actividad->cupos = $request->input('cupos');
			$actividad->precio_normal = $request->input('precio_normal');
			$actividad->descuento = $request->input('descuento');
			$actividad->updated_at = date('Y-m-d H:i:s');
			$actividad->save();
			echo "Success!";
			return redirect("/actividades/".$id)->with('success','Actividad editada con éxito');
		}
		catch(Exception $e){
			return redirect("/actividades/".$id)->with('failure','Error al editar la actividad');
		}
	}

	public function destroy($id){
		try{
			$actividad = Actividad::find($id);
			$actividad->delete();
			return redirect("/actividades/")->with('succes','Actividad eliminada con éxito');
		}
		catch(Exception $e){
			return redirect("/actividades/".$id)->with('success','Error al eliminar actividad');
		}
	}
}
