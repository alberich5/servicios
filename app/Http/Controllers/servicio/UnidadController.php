<?php

namespace App\Http\Controllers\servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unidad;

class UnidadController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }
  //funcion para mostrar el index
  public function index()
  {
      $unidad = Unidad::select('id','nombre')->get();
      return view('servicio.unidad',compact("unidad"));
  }

  public function traerUnidad()
  {
      $unidad = Unidad::select('id','nombre')->get();
      return $unidad;
  }

  public function guardar(Request $request)
  {

      $unidad=new Unidad;
      $unidad->nombre=strtoupper($request->get('nombre'));
      $unidad->save();

      return redirect('unidad');
  }


}
