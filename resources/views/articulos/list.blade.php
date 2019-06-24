@extends('layouts.app')

@section('body')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articulos Registrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Articulos</a></li>
        <li class="active">Ver lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de articulos registrados.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:5%">ID</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Precio de Venta</th>
                  <th>Categoria</th>
                  <th style="width:30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                      <td>{{$articulo->id}}</td>
                      <td>{{$articulo->codigo}}</td>
                      <td>{{$articulo->nombre}}</td>
                      <td>{{$articulo->precio_venta}}</td>
                      <td>{{$articulo->categoria}}</td>
                      <td>
                        <center>
                          <a href="{{ route('articulos.show', ['id' => $articulo->id]) }}" class="btn btn-success">Detalles</a>
                          <a href="{{ route('articulos.edit', ['id' => $articulo->id]) }}" class="btn btn-warning">Editar</a>
                          
                          <a href="{{ route('articulos.destroy', ['id' => $articulo->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_articulo').submit();" class="btn btn-danger">Eliminar</a>
                          <form id="eliminar_articulo" action="{{ route('articulos.destroy', ['id' => $articulo->id]) }}" method="POST" style="display:none">
                            {{ method_field('DELETE') }}
                            {!! csrf_field() !!}
                          </form>

                        </center>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Precio de Venta</th>
                  <th>Categoria</th>
                  <th>Opciones</th>
                </tr>
                </tfoot>
              </table>
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