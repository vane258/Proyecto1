<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\articulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = DB::table("articulos")
            ->join("categorias","articulos.categoria","=","categorias.id")
            ->select("articulos.*","categorias.nombre as categoria")
            ->get();
        return view("articulos.list",compact("articulos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categorias = Categorias::get();
        return view("articulos.create",compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new articulos;
      $articulo->codigo = $request->codigo;
      $articulo->nombre = $request->nombre;      
      $articulo->precio_venta = $request->precio_venta;
      $articulo->stock = $request->stock;
      $articulo->descripcion = $request->descripcion;
      $articulo->categoria = $request->categoria;
      
      $articulo->save();

      return redirect()->route('articulos.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = DB::table("articulos")
            ->join("categorias","articulos.categoria","=","categorias.id")
            ->select("articulos.*","categorias.nombre as categoria")
            ->where("articulos.id","=",$id)->first();
        return view("articulos.show",compact("articulo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(articulos $articulo)
    {
        $categorias = Categorias::get();
        return view("articulos.edit",compact("articulo","categorias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(articulos $articulo)
    {
        $articulo->codigo = Input::get("nombre");
      $articulo->nombre = Input::get("nombre");
      $articulo->precio_venta = Input::get("precio_venta");
      $articulo->stock = Input::get("stock");
      $articulo->descripcion = Input::get("descripcion");
      $articulo->categoria = Input::get("categoria");

      $articulo->update();

      return redirect()->route('articulos.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = articulos::find($id);
        $articulo->delete();
        return redirect()->route('articulos.list'); 
    }
}
