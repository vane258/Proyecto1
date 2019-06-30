@extends('layouts.app')

@section('body')

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Realizar una nueva venta
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ventas</a></li>
        <li class="active">Realizar Venta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
                <div class="box-body">
                    <h2 class="section-header">Productos</h2>
                      <table id="categorias" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width:5%">ID</th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Precio de Venta</th>
                          <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $articulo)
                            <tr>
                                <td> <span class="shop-item-id"> {{$articulo->id}} </span> </td>
                                <td> <span class="shop-item-code"> {{$articulo->codigo}} </span></td>
                                <td> <span class="shop-item-title"> {{$articulo->nombre}} </span> </td>
                                <td> $ <span class="shop-item-price"> {{$articulo->precio_venta}} </span> </td>
                                
                                <td>
                                    <button class="btn btn-primary shop-item-button" type="button">Añadir</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                        
                </div>
              </div>
              <div class="box box-primary">
                  <div class="box-body">
                      <form action="{{ route('ventas.store') }}" method="POST" onsubmit="return purchaseClicked()">
                          {!! csrf_field() !!}
                          
                          <h2 class="section-header"> Detalles de la venta </h2>

                          

                          <div class="form-group">
                            <label >Usuario:</label>

                            <select class="form-control" name="nombreUsuario">

                                @foreach($usuarios as $usuario )
                                <tr>
                                    <option value="{{ $usuario ->id }}"> {{ $usuario->nombre . ' ' . $usuario->apellidos }}  </option>
                                </tr>
                                @endforeach
                              
                            </select>
                          </div>

          
                          <div class="form-group">
                            <label >Cliente:</label>

                            <select class="form-control" name="cliente">

                                @foreach($clientes as $cliente )
                                <tr>
                                    <option value="{{ $cliente->id }}"> {{ $cliente->nombre }} </option>
                                </tr>
                                @endforeach
                             
                            </select>
                          </div>

                          <div class="form-group">
                            <label >Tipo de comprobande:</label>
                            <input type="text" name="tipoComprobante" class="form-control" placeholder="Tipo de comprobante" required>
                          </div>

                          <div class="form-group">
                            <label >Serie de comprobante:</label>
                            <input type="text" name="serieComprobante" class="form-control" placeholder="Serie del comprobante" required>
                          </div>

                          <div class="form-group">
                            <label >Numero de comprobante:</label>
                            <input type="text" name="numeroComprobante" class="form-control" placeholder="Numero de comprobante" required>
                          </div>


                          <h2 class="section-header"> Lista de articulos </h2>
                          <div class="cart-row">
                              <span class="cart-code cart-header cart-column">Codigo</span>
                              <span class="cart-item cart-header cart-column">Producto</span>
                              <span class="cart-price cart-header cart-column">Precio</span>
                              <span class="cart-quantity cart-header cart-column">Cantidad</span>
                          </div>

                    
                        

                        <div class="cart-items">
                        </div>

                        <div class="cart-total">
                            <strong class="cart-total-title">Total $</strong>
                            <input name="totalCompra" class="cart-total-price" value="0" > 
                        </div>
                        <center> <button class="btn btn-primary btn-purchase" type="submit">Comprar</button> </center>


                    </form>

                    
                
              </div>
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
