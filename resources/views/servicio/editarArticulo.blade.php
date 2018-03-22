@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <form action="actualizarentrada" class="form-horizontal" method="get">
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
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
              <label for="fecha">Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="fecha" value="{{ $entrada->fecha_ingreso }}" >
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-10">
              <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $entrada->descripcion }}" style="text-transform: uppercase;" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" value="{{ $entrada->marca }}" style="text-transform: uppercase;" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="status">Unidad:</label>
              <select name="unidad" class="form-control">
                <option v-for="uni in unidad" v-bind:value="uni.id" class="lista">
                  @{{ uni.nombre}}
                </option>
              </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="precio">Precio Unitario:</label>
                <input type="text" class="form-control" name="precio" value="{{ $entrada->precio }}"  required>
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
