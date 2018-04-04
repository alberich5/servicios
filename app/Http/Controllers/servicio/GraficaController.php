<?php

namespace App\Http\Controllers\servicio;

use Illuminate\Http\Request;
use App\Entrada;
use Khill\Lavacharts\Lavacharts;

class GraficaController extends Controller
{
  //funcion para mostrar el index
  public function index()
  {

        return view('servicio.funciones.graficas');
  }


  //funcion para mostrar el index
  public function cargararticulosCancelados()
  {
    $entradas = Entrada::where('status','=', 'cancelado')

    ->get();


    return $entradas;
  }

}
