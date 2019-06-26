<?php

Route::get('/', 'Auth\LoginController@index')->name('main');
Auth::routes();


Route::group(['middleware'=>['auth']], function () {
    Route::get('/principal', 'HomeController@index')->name('dashboard');
    
    Route::group(['middleware'=>['access:1']], function(){
      
        Route::get('/categorias', 'CategoriasController@index')->name('categorias.list');
        Route::get('/categorias/{id}', 'CategoriasController@show')->where('id', '[0-9]+')->name('categorias.show');
        Route::get('/categorias/nueva', 'CategoriasController@create')->name('categorias.create');
        Route::get('/categorias/{categoria}/editar', 'CategoriasController@edit')->where('id', '[0-9]+')->name('categorias.edit');
        Route::post('/categorias', 'CategoriasController@store')->name('categorias.store');
        Route::delete('/categorias/{categoria}', 'CategoriasController@destroy')->name('categorias.destroy');
        Route::put('/categorias/{categoria}', 'CategoriasController@update')->name('categorias.update');
      
        Route::get('/proveedores', 'ProveedorController@index')->name('proveedores.list');
        Route::get('/proveedores/{id}', 'ProveedorController@show')->where('id', '[0-9]+')->name('proveedores.show');
        Route::get('/proveedores/nuevo', 'ProveedorController@create')->name('proveedores.create');
        Route::get('/proveedores/{proveedor}/editar', 'ProveedorController@edit')->where('id', '[0-9]+')->name('proveedores.edit');
        Route::post('/proveedores', 'ProveedorController@store')->name('proveedores.store');
        Route::delete('/proveedores/{proveedor}', 'ProveedorController@destroy')->name('proveedores.destroy');
        Route::put('/proveedores/{proveedor}', 'ProveedorController@update')->name('proveedores.update');
      
        Route::get('/articulos', 'ArticulosController@index')->name('articulos.list');
        Route::get('/articulos/{id}', 'ArticulosController@show')->where('id', '[0-9]+')->name('articulos.show');
        Route::get('/articulos/nuevo', 'ArticulosController@create')->name('articulos.create');
        Route::get('/articulos/{articulo}/editar', 'ArticulosController@edit')->where('id', '[0-9]+')->name('articulos.edit');
        Route::post('/articulos', 'ArticulosController@store')->name('articulos.store');
        Route::delete('/articulos/{articulo}', 'ArticulosController@destroy')->name('articulos.destroy');
        Route::put('/articulos/{articulo}', 'ArticulosController@update')->name('articulos.update');





        Route::get('/clientes', 'ClientesController@index')->name('clientes.list');
        Route::get('/clientes/{id}', 'ClientesController@show')->where('id', '[0-9]+')->name('clientes.show');
        Route::get('/clientes/nuevo', 'ClientesController@create')->name('clientes.create');
        Route::get('/clientes/{cliente}/editar', 'ClientesController@edit')->where('id', '[0-9]+')->name('clientes.edit');
        Route::post('/clientes', 'ClientesController@store')->name('clientes.store');
        Route::delete('/clientes/{cliente}', 'ClientesController@destroy')->name('clientes.destroy');
        Route::put('/clientes/{cliente}', 'ClientesController@update')->name('clientes.update');
    }); 
});

Route::get('type/{type}', 'SweetAlertController@notification');
