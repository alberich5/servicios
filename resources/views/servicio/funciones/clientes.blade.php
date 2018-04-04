@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Listado de Clientes</h1></center>
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
      <div id="entrada">
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
                <input type="hidden" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="cliente">Nombre del cliente:</label>
                <input type="text" class="form-control" name="cliente" placeholder="Nombre del cliente..." value="{{old('domicilio')}}" required style="text-transform: uppercase;">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click="mostrarAlert">
    </form>
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Id</th>
              <th>Nombre</th>
    				</thead>
                   @foreach ($clientes as $cli)
    				<tr>
    					<td>{{ $cli->id}}</td>
              <td>{{ $cli->nombre}}</td>

    				</tr>

    				@endforeach
    			</table>
    		</div>
    		{{$clientes->render()}}
    	</div>
    </div>

    </div>
  </div>


@endsection

@section('js')


@endsection
