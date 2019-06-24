@extends('layouts.app')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalles de proveedor
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Proveedores</a></li>
        <li class="active">Detalles de proveedor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles de proveedor.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
                <h5> <strong>Nombre completo: </strong>{{$proveedor->nombre}} {{$proveedor->apellidos}}</h5>
                
                <h5> <strong>Tipo de documento: </strong>{{$proveedor->tipo_documento}}</h5>
              <h5> <strong>Numero de documento: </strong>{{$proveedor->num_documento}}</h5>
              <h5> <strong>Dirección: </strong>{{$proveedor->direccion}}</h5>
              <h5> <strong>Teléfono: </strong>{{$proveedor->telefono}}</h5>
              <h5> <strong>Email: </strong>{{$proveedor->email}}</h5>
              <hr>
              <h5> <strong>Nombre de contacto: </strong>{{$proveedor->contacto}}</h5>
              <h5> <strong>Teléfono de contacto: </strong>{{$proveedor->telefono_contacto}}</h5>
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