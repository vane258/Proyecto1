<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::get();
        return view("proveedores.list",compact("proveedores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proveedores.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proveedor = new Proveedor;
      $proveedor->nombre = $request->nombre;
      $proveedor->apellidos = $request->apellidos;      
      $proveedor->tipo_documento = $request->tipo_documento;
      $proveedor->num_documento = $request->num_documento;
      $proveedor->direccion = $request->direccion;
      $proveedor->telefono = $request->telefono;
      $proveedor->email = $request->email;
      $proveedor->contacto = $request->contacto;
      $proveedor->telefono_contacto = $request->telefono_contacto;

      $proveedor->save();

      return redirect()->route('proveedores.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view("proveedores.show",compact("proveedor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view("proveedores.edit",compact("proveedor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Proveedor $proveedor)
    {
      $proveedor->nombre = Input::get("nombre");
      $proveedor->apellidos = Input::get("apellidos");
      $proveedor->tipo_documento = Input::get("tipo_documento");
      $proveedor->num_documento = Input::get("num_documento");
      $proveedor->direccion = Input::get("direccion");
      $proveedor->telefono = Input::get("telefono");
      $proveedor->email = Input::get("email");
      $proveedor->contacto = Input::get("contacto");
      $proveedor->telefono_contacto = Input::get("telefono_contacto");

      $proveedor->update();

      return redirect()->route('proveedores.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $proveedor = Proveedor::find($id);
      $proveedor->delete();
     return redirect()->route('proveedores.list'); 
    }
}
