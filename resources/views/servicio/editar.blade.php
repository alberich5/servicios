@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <form action="actualizararticulo" class="form-horizontal" method="post">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="entrada">


        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
                <input type="hidden" class="form-control" name="id_entrada" value="{{$post->id }}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
              <label for="fecha">Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="fecha" value="{{ $post->fecha_ingreso }}" >
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-10">
              <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $post->descripcion }}"  style="text-transform: uppercase;" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca"  value="{{ $post->marca }}" style="text-transform: uppercase;" required>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-10">
              <label for="precio">Precio Unitario:</label>
                <input type="text" class="form-control" name="precio" value="{{ $post->precio }}"   required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="cantidad">Cantidad:</label>
                <input type="text" class="form-control" name="cantidad" value="{{ $post->cantidad }}" onkeypress="return valida(event)" required>
            </div>
        </div>


        <input type="submit" class="btn btn-primary" value="Actualizar" >
    </form>
    </div>
    <!--
    <div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>
  </div>-->
@endsection
