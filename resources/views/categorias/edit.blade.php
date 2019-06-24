@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Categorias</a></li>
        <li class="active">Editar categoria</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para editar una categoria</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('categorias.update', ['categoria'=>$categoria->id]) }}" method="POST" >
              {{ method_field('PUT') }}
							{!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" required placeholder="Nombre de categoria">
                </div>
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea name="descripcion" class="form-control" placeholder="Descripcion de categoria" required cols="30" rows="10">{{$categoria->descripcion}}</textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar Categoria</button>
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
