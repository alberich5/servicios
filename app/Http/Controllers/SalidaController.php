<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Entrada;
use App\Salida;
use App\Cliente;

class SalidaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {
    $dia=date('d');
    $mes=date('m');
    $ano=date('y');
    //$fecha=$ano.'-'.$mes.'-'.$dia;
    $fecha="2018-02-21"
    $tamano = count($request->variable);
    for($i=0; $i<$tamano; $i++){

      $salida=new Salida;
      $salida->id_entrada=$request->variable[$i]['id'];
      $salida->id_cliente=$request->variable[$i]['cliente'];
      $salida->id_usuario=$request->variable[$i]['id_usuario'];
      $salida->cantidad=$request->variable[$i]['otro'];
      $salida->fecha_salida=$fecha;
      $salida->save();

      $unidad = Entrada::select('id','cantidad')
      ->where('id','=', $request->variable[$i]['id'])
      ->get();
      $var="";
      foreach ($unidad as $uni) {
          $var = $uni->cantidad;
      }

      $entrada=Entrada::findOrFail($request->variable[$i]['id']);
      $entrada->cantidad=$var-$request->variable[$i]['otro'];
      $entrada->update();
    }
    return $tamano;

  }

    public function pruebas(){
        $unidad = Entrada::select('id','cantidad')
        ->where('id','=', "15")
        ->get();
        $var="";
        foreach ($unidad as $uni) {
            $var = $uni->cantidad;
        }
        $final=$var-1;

        dd($final);

    }

    public function crearWord(Request $request){

      $client = Cliente::select('id','nombre')
      ->where('id','=', $request->get('cliente'))
      ->get();
      $var="";
      foreach ($client as $cli) {
          $var = $cli->nombre;
      }

      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $section = $phpWord->addSection();

      $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantilla/formato1.docx');
      $dia=date('d');
      $mes=date('m');
      $ano=date('y');


      $templateWord->setValue('dia',$dia);
      $templateWord->setValue('mes',$mes);
      $templateWord->setValue('ano',$ano);

      $templateWord->setValue('area',$var);
      $templateWord->setValue('articulo0',$request->get('articulo'));
      $templateWord->setValue('unidad0','pieza');
      $templateWord->setValue('cant0',$request->get('cantidad'));
      $templateWord->saveAs('salida.docx');
      //$this->historial('Descarga de oficio de alta del elemento '.$id);
      $nombreDocumento=str_replace("  "," ","omar");
      return Response::download('salida.docx',$nombreDocumento.'.docx');
    }

}
