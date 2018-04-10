@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Ubicacion del producto</h1></center>
    <div id="articulo">
      <form action="clientes" class="form-horizontal" method="get">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

  </div>


@endsection

@section('js')


@endsection
