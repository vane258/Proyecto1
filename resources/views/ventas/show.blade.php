@extends('layouts.app')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalles de la venta
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Ventas </a></li>
        <li class="active"> Detalles de la venta </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles de la venta.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
               <h5> <strong>Id Venta: </strong>{{$venta->id }}</h5>
               <h5> <strong>Cliente: </strong>{{$venta->cliente}}</h5>
               <h5> <strong>Usuario que hizo la venta: </strong>{{$venta->usuarioNombre . ' ' . $venta->usuarioApellidos }}</h5>
               <h5> <strong>Tipo de Comprobante: </strong>{{$venta->tipo_comprobante}}</h5>
               <h5> <strong>Serie del comprobante: </strong>{{$venta->serie_comprobante}}</h5>
               <h5> <strong>Numero del comprobante: </strong>{{$venta->num_comprobante}}</h5>
               <h5> <strong>Fecha: </strong>{{$venta->fecha_hora}}</h5>
               <h5> <strong>Impuesto: </strong>{{$venta->impuesto}}</h5>
               <h5> <strong>Total: </strong>{{$venta->total_venta}}</h5>
               <h5> <strong>Estado: </strong>{{$venta->estado}}</h5>

                <hr/>

                <h3>Productos en la venta</h3>

                @foreach($articulos as $articulo)
                    <h5> <strong>Codigo: </strong>{{$articulo->codigoArticulo }}</h5>
                    <h5> <strong>Nombre: </strong>{{$articulo->nombreArticulo }}</h5>
                    <h5> <strong>Precio: </strong>{{$articulo->precioVenta }}</h5> 
                    <h5> <strong>Cantidad: </strong>{{$articulo->cantidad }}</h5> 
                    <h5> <strong>Total: </strong>{{$articulo->cantidad * $articulo->precioVenta }}</h5>             
                    <hr/>
                @endforeach
 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection