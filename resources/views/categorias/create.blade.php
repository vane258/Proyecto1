@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Añadir nueva categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Categorias</a></li>
        <li class="active">Añadir categoria</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para añadir una categoria</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('categorias.store') }}" method="POST" >
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de categoria" required>
                </div>
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea name="descripcion" class="form-control" placeholder="Descripcion de categoria" cols="30" rows="10" required></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar Categoria</button>
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
