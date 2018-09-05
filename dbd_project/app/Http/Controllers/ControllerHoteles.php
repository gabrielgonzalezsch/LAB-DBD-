<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use App\Services\SearchService;

class ControllerHoteles extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $hoteles = Hotel::orderBy('id_hotel', 'asc')->paginate(6); //Cambiar a ordenarlos segun criterios
      return view('hoteles.buscar-hoteles')->with('hoteles', $hoteles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('hoteles.insertar-hotel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $validData = $request->validate([
          'nombre_hotel' => 'required',
          'pais' => 'required',
          'ciudad' => 'required',
          'direccion' => 'required|unique:hoteles',
      ]);

      $hotel = new Hotel();
      $hotel->nombre_hotel = $request->input('nombre_hotel');
      $hotel->pais = $request->input('pais');
      $hotel->ciudad = $request->input('ciudad');
      $hotel->direccion = $request->input('direccion');
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

    public function show($id){
      try{
          $hotel = Hotel::findOrFail($id);
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
    public function edit($id){
      try{
        $hotel = Hotel::findOrFail($id);
        return view('hoteles.editar-hotel')->with('hotel',$hotel);
      }
      catch(Exception $e){
        echo "Error";
        return redirect('/hotel')->with('failure','Hotel no existente');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validData = $request->validate([
          'nombre_hotel' => 'string',
          'pais' => 'string',
          'ciudad' => 'string',
          'direccion' => 'string',
        ]);
      $hotel = Hotel::find($id);
      $hotel->nombre_hotel = $request->input('nombre_hotel');
      $hotel->pais = $request->input('pais');
      $hotel->ciudad = $request->input('ciudad');
      $hotel->latitud = 0;
      $hotel->longitud = 0;
      $hotel->direccion = $request->input('direccion');
      $hotel->updated_at = date('Y-m-d H:i:s');
      $hotel->save();
      echo "Success!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      try{
      $hotel = Hotel::findOrFail($id);
      $hotel->delete();
      return redirect('/hoteles')->with('success', 'Hotel eliminado con éxito (faltan borrar sus hoteles...)');
      }catch(Exception $e){
        return redirect('/hoteles')->with('failure', 'Hubo un error al eliminar el hotel');
      }
    }

    public function buscarHotelesPorCiudad(Request $request){
      $validate = $request->validate([
        'ciudad' => 'required|string'
      ]);
      $this->searchService = \App::make(SearchService::class);
      $hoteles = $this->searchService->buscarHotelesPorCiudad($request['ciudad']);
      return view("hoteles.buscar-hoteles")->with('hoteles', $hoteles);
    }

    public function buscarHotelesPorPais(Request $request){
      $validate = $request->validate([
        'pais' => 'required|string'
      ]);
      $this->searchService = \App::make(SearchService::class);
      $hoteles = $this->searchService->buscarHotelesPorPais($request['pais']);
      return view("hoteles.buscar-hoteles")->with('hoteles', $hoteles);
    }
}
