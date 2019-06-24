@extends('layouts.app')

@section('body')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proveedores Registrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Proveedores</a></li>
        <li class="active">Ver lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de proveedores registrados.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:5%">ID</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>E-mail</th>
                  <th style="width:30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                    <tr>
                      <td>{{$proveedor->id}}</td>
                      <td>{{$proveedor->nombre}} {{$proveedor->apellidos}}</td>
                      <td>{{$proveedor->telefono}}</td>
                      <td>{{$proveedor->email}}</td>
                      <td>
                        <center>
                          <a href="{{ route('proveedores.show', ['id' => $proveedor->id]) }}" class="btn btn-success">Detalles</a>
                          <a href="{{ route('proveedores.edit', ['id' => $proveedor->id]) }}" class="btn btn-warning">Editar</a>
                          
                          <a href="{{ route('proveedores.destroy', ['id' => $proveedor->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_proveedor').submit();" class="btn btn-danger">Eliminar</a>
                          <form id="eliminar_proveedor" action="{{ route('proveedores.destroy', ['id' => $proveedor->id]) }}" method="POST" style="display:none">
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
                  <th>Teléfono</th>
                  <th>E-mail</th>
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