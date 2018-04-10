@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="articulos">
    <center><h1></h1></center>
<div id="articulo">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
              <th>Fecha Ingreso</th>
    					<th>Descripcion</th>
    					<th>Marca</th>
              <th>Medida</th>
              <th>Precio sin Iva</th>
    					<th>Precio con Iva</th>
    					<th>Inicial</th>
              <th>Salidas</th>
              <th>Final</th>
              <th>Costo Final</th>
    				</thead>
                   @foreach ($root as $ro)
            <tbody>
              	<td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->fecha_ingreso}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->fecha_ingreso}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->descripcion}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->descripcion}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->marca}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->marca}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->nombre}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->nombre}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->precio}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->precio}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->precio_iva}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->precio_iva}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->existenciaini}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->existenciaini}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->salidas}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->salidas}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->existenciafina}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->existenciafina}}
                  @endif
                </td>
                <td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->costo_final}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->costo_final}}
                  @endif
                </td>
              
    				</tbody>
    				@endforeach
    			</table>
    		</div>
        {{$root->render()}}
    	</div>
    </div>



</div>
<!--
<div class="row">
   <div class="col-xs-12">
     <pre>@{{$data}}</pre>
   </div>
 </div>-->
  </div>




  </div>


@endsection
