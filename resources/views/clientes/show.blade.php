@extends('layouts.app')

@section('body')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Detalles del cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Clientes </a></li>
        <li class="active"> Detalles del cliente </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalles del cliente.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
                <h4> <strong>Nombre completo: </strong>{{$cliente->nombre}}</h4>
                
                <h4> <strong>Tipo de Documento: </strong>{{$cliente->tipo_documento}}</h4>

                <h4> <strong>Numero de documento: </strong>{{$cliente->num_documento}}</h4>

                <h4> <strong>Direccion: </strong>{{$cliente->direccion}}</h4>

                <h4> <strong>Telefono: </strong>{{$cliente->telefono }}</h4>

                <h4> <strong>Correo: </strong>{{$cliente->email}}</h4>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection