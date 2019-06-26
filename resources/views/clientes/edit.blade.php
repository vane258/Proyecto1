@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clientes</a></li>
        <li class="active">Editar cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Favor de llenar los campos del formulario para editar un cliente</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('clientes.update', ['cliente'=>$cliente->id]) }}" method="POST" >
              {{ method_field('PUT') }}
							{!! csrf_field() !!}
              <div class="box-body">
               <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre del cliente" value="{{$cliente->nombre}}" required>
                </div>
                <div class="form-group">
                  <label >Tipo de documento</label>
                  <input type="text" name="tipo_documento" class="form-control" placeholder="Tipo de documento del cliente" value="{{$cliente->tipo_documento}}" required>
                </div>
                <div class="form-group">
                  <label >Numero de documento</label>
                  <input type="text" name="num_documento" class="form-control" placeholder="Numero de documento del cliente" value="{{$cliente->num_documento}}" required>
                </div>
                <div class="form-group">
                  <label>Dirección</label>
                  <textarea name="direccion" class="form-control" placeholder="Dirección del cliente" cols="30" rows="6" required>{{$cliente->direccion}}</textarea>
                </div>
                <div class="form-group">
                  <label >Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Telefono del cliente" value="{{$cliente->telefono}}" required>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email del cliente" required value="{{$cliente->email}}">
                </div>
                
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar cliente</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          
          

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>   
@endsection
