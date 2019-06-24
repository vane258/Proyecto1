@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Añadir nuevo proveedor
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Proveedores</a></li>
        <li class="active">Añadir proveedor</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para añadir un proveedor</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('proveedores.store') }}" method="POST" >
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de proveedor" required>
                </div>
                <div class="form-group">
                  <label >Apellidos</label>
                  <input type="text" name="apellidos" class="form-control" placeholder="Apellidos de proveedor" required>
                </div>
                <div class="form-group">
                  <label >Tipo de documento</label>
                  <input type="text" name="tipo_documento" class="form-control" placeholder="Tipo de documento de proveedor" required>
                </div>
                <div class="form-group">
                  <label >Numero de documento</label>
                  <input type="text" name="num_documento" class="form-control" placeholder="Numero de documento de proveedor" required>
                </div>
                <div class="form-group">
                  <label>Dirección</label>
                  <textarea name="direccion" class="form-control" placeholder="Dirección de proveedor" cols="30" rows="6" required></textarea>
                </div>
                <div class="form-group">
                  <label >Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Telefono de proveedor" required>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email de proveedor" required>
                </div>
                <hr>
                <h6>Contacto</h6>
                <div class="form-group">
                  <label >Nombre de contacto</label>
                  <input type="text" name="contacto" class="form-control" placeholder="Contacto de proveedor" required>
                </div>
                <div class="form-group">
                  <label >Teléfono de contacto</label>
                  <input type="text" name="telefono_contacto" class="form-control" placeholder="Telefono de contacto de proveedor" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
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
