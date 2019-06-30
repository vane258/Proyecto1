@extends('layouts.app')
@section('body')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ventas realizadas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#">Ventas</a></li>
        <li class="active">Ver lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de ventas realizadas.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categorias" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:5%">ID</th>
                  <th>Cliente</th>
                  <th>Usuario</th>
                  <th>Numero</th>
                  <th>Fecha</th>
                  <th>Impuesto</th>
                  <th>Total</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                      <td>{{$venta->id}}</td>
                      <td>{{$venta->cliente}}</td>
                      <td>{{$venta->usuarioNombre . ' ' . $venta->usuarioApellidos}} </td>
                      <td>{{$venta->num_comprobante}} </td>
                      <td>{{$venta->fecha_hora}}</td>
                      <td>{{$venta->impuesto}}</td>
                      <td>{{$venta->total_venta}}</td>
                      <td>{{$venta->estado}}</td>
                      <td>
                        <center>
                          <a href="{{ route('ventas.show', ['id' => $venta->id]) }}" class="btn btn-success">Detalles</a>
                          
                          <a href="{{ route('ventas.destroy', ['id' => $venta->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_venta').submit();" class="btn btn-danger">Eliminar</a>
                          <form id="eliminar_venta" action="{{ route('ventas.destroy', ['id' => $venta->id]) }}" method="POST" style="display:none">
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
                    <th style="width:5%">ID</th>
                    <th>Cliente</th>
                    <th>Usuario</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                    <th>Estado</th>
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