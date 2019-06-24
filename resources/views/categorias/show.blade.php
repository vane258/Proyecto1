@extends('layouts.app')

@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalles de categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Categorias</a></li>
        <li class="active">Detalles de categoria</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles de categoria.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
                <h5> <strong>Nombre: </strong>{{$categoria->nombre}}</h5>
                
                <h5> <strong>Descripción: </strong>{{$categoria->descripcion}}</h5>
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