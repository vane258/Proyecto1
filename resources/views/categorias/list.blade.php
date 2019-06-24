@extends('layouts.app')

@section('body')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorias Registradas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Categorias</a></li>
        <li class="active">Ver lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de categorias registradas.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:10%">ID</th>
                  <th>Nombre</th>
                  <th style="width:40%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                      <td>{{$categoria->id}}</td>
                      <td>{{$categoria->nombre}}</td>
                      <td>
                        <center>
                          <a href="{{ route('categorias.show', ['id' => $categoria->id]) }}" class="btn btn-success">Detalles</a>
                          <a href="{{ route('categorias.edit', ['id' => $categoria->id]) }}" class="btn btn-warning">Editar</a>
                          
                          <a href="{{ route('categorias.destroy', ['id' => $categoria->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_categoria').submit();" class="btn btn-danger">Eliminar</a>
                          <form id="eliminar_categoria" action="{{ route('categorias.destroy', ['id' => $categoria->id]) }}" method="POST" style="display:none">
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
                  <th>Nombre</th>
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