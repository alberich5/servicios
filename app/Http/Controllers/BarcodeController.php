<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;

class BarcodeController extends Controller
{
  public function index(Request $request)
  {
    $producto = Entrada::all(['descripcion','precio','id']);

    return view('servicio.barcode')->with('producto',$producto);

  }
}
