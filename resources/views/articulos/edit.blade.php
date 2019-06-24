@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar articulo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Articulos</a></li>
        <li class="active">Editar articulo</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para editar un articulo</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('articulos.update', ['articulo'=>$articulo->id]) }}" method="POST" >
              {{ method_field('PUT') }}
							{!! csrf_field() !!}
              <div class="box-body">
                  <div class="form-group">
                  <label >Codigo</label>
                  <input type="text" name="codigo" class="form-control" value="{{$articulo->codigo}}" placeholder="Codigo de articulo" required>
                </div>
                 <div class="form-group">
                  <label >Categoria</label>
                  <select name="categoria" class="form-control" onchange="verificar(this.value)">
                      <option value="0">Seleccionar categoria</option>
                    @foreach($categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                   </select>
                </div>
                 
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}" placeholder="Nombre de articulo" required>
                </div>
               
                <div class="form-group">
                  <label >Precio de venta</label>
                  <input type="number" name="precio_venta" class="form-control" value="{{$articulo->precio_venta}}" placeholder="Precio de articulo" required>
                </div>
                <div class="form-group">
                  <label >Stock</label>
                  <input type="number" name="stock" class="form-control" value="{{$articulo->stock}}" placeholder="Stock de articulo" required>
                </div>
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea name="descripcion" class="form-control" placeholder="Descripción de articulo" cols="30" rows="6" required>{{$articulo->descripcion}}</textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" id="guardar" style="display:none" class="btn btn-primary">Editar Articulo</button>
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

<script>
  function verificar(id){
    if(id!=0){
      document.getElementById("guardar").style.display = "inline";
    }else{
      document.getElementById("guardar").style.display = "none";
    }
    
  }
</script>
@endsection
