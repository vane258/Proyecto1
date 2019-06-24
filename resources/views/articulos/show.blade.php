@extends('layouts.app')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalles de articulo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Articulos</a></li>
        <li class="active">Detalles de articulo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles de articulo.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <h5> <strong>Codigo: </strong>{{$articulo->codigo}}</h5>
                <h5> <strong>Nombre: </strong>{{$articulo->nombre}}</h5>
                
                <h5> <strong>Precio de Venta: </strong> $ {{$articulo->precio_venta}}</h5>
              <h5> <strong>Stock: </strong>{{$articulo->stock}}</h5>
              <h5> <strong>Descripcion: </strong>{{$articulo->descripcion}}</h5>
                <h5> <strong>Categoria: </strong>{{$articulo->categoria}}</h5>
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