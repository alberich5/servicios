@extends('layouts.app')

@section('content')

<div class="container" id="app">
  <center><h1>Codigos de barras</h1></center>
  <div id="articulo">
    @foreach( $producto as $product)
        {{--*/ $producto = '"'.$product->descripcion.'"' /*--}}

        <div>
            {!! DNS1D::getBarcodeHTML($product->id, "C128")!!}
        </div>
        <div style="padding-top: 50px;width: 24%;">
            {{ $product->descripcion }}
        </div>


    @endforeach





    <style>
        .code {
            height: 80px !important;
        }
    </style>


  </div>
</div>




@endsection
