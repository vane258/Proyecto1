@extends('layouts.app')
@section('body')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes Registrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#">Clientes</a></li>
        <li class="active">Ver lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de clientes registrados.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:5%">ID</th>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Teléfono</th>
                  <th>E-mail</th>
                  <th style="width:30%">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                      <td>{{$cliente->id}}</td>
                      <td>{{$cliente->nombre}} </td>
                      <td>{{$cliente->direccion}} </td>
                      <td>{{$cliente->telefono}}</td>
                      <td>{{$cliente->email}}</td>
                      <td>
                        <center>
                          <a href="{{ route('clientes.show', ['id' => $cliente->id]) }}" class="btn btn-success">Detalles</a>
                          <a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-warning">Editar</a>
                          
                          <a href="{{ route('clientes.destroy', ['id' => $cliente->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_cliente').submit();" class="btn btn-danger">Eliminar</a>
                          <form id="eliminar_cliente" action="{{ route('clientes.destroy', ['id' => $cliente->id]) }}" method="POST" style="display:none">
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
                    <th>Direccion</th>
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