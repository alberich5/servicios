<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;
use App\Log;
use DB;

class EntradaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;

      $entrada=new Entrada;
      $entrada->id_usuario=$request->get('id_usuario');
      $entrada->id_unidad=$request->get('unidad');
      $entrada->fecha_ingreso=$request->get('fecha');
      $entrada->descripcion=strtoupper($request->get('descripcion'));
      $entrada->marca=strtoupper($request->get('marca'));
      $entrada->precio=$request->get('precio');
      $entrada->precio_iva=$iva;
      $entrada->cantidad=$request->get('cantidad');
      $entrada->cantidadOriginal=$request->get('cantidad');
      $entrada->status='activo';
      $entrada->motivo='';
      $entrada->save();



      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }

      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entrada';
      $log->fecha_log=$request->get('fecha');
      $log->save();


      return redirect('articulos');
  }

  public function mostrar()
  {
    $entradas = Entrada::leftjoin('unidad', 'entrada.id_unidad', '=', 'unidad.id')
  ->where('status','=', 'activo')
  ->orderBy('entrada.created_at', 'desc')
  ->paginate(10);
    return view('servicio.articulos',compact("entradas"));

  }
  public function cancelados()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'cancelado')
    ->paginate(10);
    return view('servicio.cancelados',compact("entradas"));

  }

  public function canceladosvue()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'cancelado')
    ->get();

    return $entradas;

  }



  public function mostrarArticulos(Request $request)
  {
    $consul=strtoupper($request->get('query'));
    $entradas = Entrada::leftjoin('unidad', 'entrada.id_unidad', '=', 'unidad.id')
    ->where('descripcion','like', "%".$consul."%")
    ->where('status','=', 'activo')
    ->orderBy('entrada.created_at', 'asc')
    ->get();

      $total = count($entradas);
    for ($i=0; $i <$total ; $i++) {
        $entradas[$i]->prueba=0;
    }
      if ($total>=1) {
      return $entradas;
      }else{
        return $entradas;
      }

    return $entradas;
  }

  public function reactivar(Request $request)
  {
    $motivo=strtoupper($request->get('motivo'));
    $entrada=Entrada::findOrFail($request->get('id'));
    $entrada->status='activo';
    $entrada->motivo=$motivo;
    $entrada->update();
    return "se reactivo producto";
  }

  public function verificarproducto(Request $request)
  {
          $quey=strtoupper($request->get('query'));
          $buscado = Entrada::orderBy('created_at', 'asc')
          ->where('descripcion','like', "%".$quey."%")
          ->where('status','=', 'activo')
          ->get();
           $cnta=count($buscado);

    return $cnta;
  }

  public function eliminar($id)
  {

    $entrada = Entrada::orderBy('created_at', 'desc')
    ->where('id','=', $id)
    ->get();

    $cantoriginal="";
    $cantinicial="";
    foreach ($entrada as $entra) {
        $cantoriginal = $entra->cantidadOriginal;
        $cantinicial = $entra->cantidad;
    }

    if ($cantoriginal == $cantinicial ) {
      $entrada=Entrada::findOrFail($id);
      $entrada->status='cancelado';
      $entrada->update();
        return redirect('articulos');
    }else{
      dd("no se puede elimnar porque ya ubo salida");
    }


    return redirect('articulos');
  }

  public function destroy($id)
  {

      dd("entro al destruir de los articulos");
  }


  public function editar(Request $request)
  {
    $post=Entrada::findOrFail($request->get('id'));

    return view('servicio/editar',compact('post'));
  }

  public function actual(Request $request)
  {


    $entrada=Entrada::findOrFail($request->get('id_entrada'));
    $entrada->fecha_ingreso=$request->get('fecha');
    $entrada->descripcion=$request->get('descripcion');
    $entrada->marca=$request->get('marca');
    $entrada->precio=$request->get('precio');
    $entrada->cantidad=$request->get('cantidad');
    $entrada->update();


    DB::table('log')
            ->where('id_entrada', $request->get('id_entrada'))
            ->update(['cantidad_inicial' => $request->get('cantidad')]);

    return redirect('articulos');
  }

}
