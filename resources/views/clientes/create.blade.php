@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Añadir nuevo cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clientes</a></li>
        <li class="active">Añadir cliente</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para añadir un cliente</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('clientes.store') }}" method="POST" >
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label >Nombre completo</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de cliente" required>
                </div>

                <div class="form-group">
                  <label >Tipo de documento</label>
                  <input type="text" name="tipo_documento" class="form-control" placeholder="Tipo de documento de cliente" required>
                </div>
                <div class="form-group">
                  <label >Numero de documento</label>
                  <input type="text" name="num_documento" class="form-control" placeholder="Numero de documento de cliente" required>
                </div>
                <div class="form-group">
                  <label>Dirección</label>
                  <textarea name="direccion" class="form-control" placeholder="Dirección de cliente" cols="30" rows="6" required></textarea>
                </div>
                <div class="form-group">
                  <label >Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Telefono de cliente" required>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email de cliente" required>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
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