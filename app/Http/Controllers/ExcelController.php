<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entrada;
use App\Salida;

class ExcelController extends Controller
{
  public function exportUsers()
  {
    \Excel::create('Users', function($excel) {

  $users = User::all();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Número', 'Nombre', 'Email','Rol', 'Fecha de Creación', 'Fecha de Actualización'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->id, $user->name, $user->email,$user->rol, $user->created_at, $user->updated_at
    ]);
}
});
})->export('xlsx');

  }

  public function exportEntradas(Request $request)
  {

    \Excel::create('Entrada', function($excel) {
$consul = request()->get('fecha');
  $users = Entrada::where('fecha_ingreso','=', $consul)
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha Ingreso', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }

  public function exportSalidas(Request $request)
  {

    \Excel::create('Salida', function($excel) {
$consul = request()->get('fecha');
  $users = Salida::where('fecha_salida','=', $consul)
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha Salida', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_salida, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }

  public function exportProducto()
  {
    \Excel::create('productosCero', function($excel) {
  $users = Entrada::where('cantidad','=', '0')
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }


  public function exportMensual(Request $request)
  {
    \Excel::create('Mensual', function($excel) {
      $mes = request()->get('mes');
      $inicio='';
      $fin='';
        switch ($mes) {
          case '1':
            $inicio='2018-01-01';
            $fin='2018-01-31';
            break;
          case '2':
            $inicio='2018-02-01';
            $fin='2018-02-28';
            break;
          case '3':
            $inicio='2018-03-01';
            $fin='2018-03-31';
            break;
          case '4':
            $inicio='2018-04-01';
            $fin='2018-04-30';
            break;
          case '5':
                # code...
            break;
          case '6':
                  # code...
            break;

        }
  $users = Entrada::where('fecha_ingreso','>=', $inicio)
  ->where('fecha_ingreso','<=', $fin)
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }


}
