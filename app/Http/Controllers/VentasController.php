<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Ventas;
use App\articulos;
use App\Clientes;
use App\User;
use App\detalle_venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = DB::table("ventas")
            ->join("clientes","ventas.idcliente","=","clientes.id")
            ->join("users", "ventas.idusuario", "=", "users.id")
            ->select("ventas.*","clientes.nombre as cliente", "users.nombre as usuarioNombre", "users.apellidos as usuarioApellidos" )
            ->get();
        return view("ventas.list",compact("ventas"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $usuarios = User::get();

        $clientes = Clientes::get();

        $articulos = DB::table("articulos")
            ->join("categorias","articulos.categoria","=","categorias.id")
            ->select("articulos.*","categorias.nombre as categoria")
            ->get();

        return view("ventas.create",compact("articulos", "clientes", "usuarios"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Ventas;
        $venta->idCliente = $request->cliente;
        $venta->idUsuario = $request->nombreUsuario;
        $venta->tipo_comprobante = $request->tipoComprobante;
        $venta->serie_comprobante = $request->serieComprobante;
        $venta->num_comprobante = $request->numeroComprobante;
        $venta->fecha_hora = date('Y-m-d H:i:s');
        $venta->impuesto = $request->totalCompra * 0.18;
        $venta->total_venta = $request->totalCompra;
        $venta->estado = 'Pagado';
        $venta->save();


        $totalProductosDiferentes = Input::get("totalProductos");


        for ($i=1; $i <= $totalProductosDiferentes ; $i++) { 

            $detalle_venta = new detalle_venta;
            $detalle_venta->idventa = $venta->id;
            $detalle_venta->idarticulo = Input::get("idProducto".$i);
            $detalle_venta->cantidad = Input::get("cantidadProducto".$i);
            $detalle_venta->precio_venta = Input::get("precioProducto".$i);
            $detalle_venta->descuento = 0;
            $detalle_venta->save();

            $detalle_venta = '';
            
        }

        return redirect()->route('ventas.list');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = DB::table("ventas")
            ->join("clientes","ventas.idcliente","=","clientes.id")
            ->join("users", "ventas.idusuario", "=", "users.id")
            ->select("ventas.*","clientes.nombre as cliente", "users.nombre as usuarioNombre", "users.apellidos as usuarioApellidos" )
            ->where("ventas.id","=",$id)
            ->first();;
            
        $articulos = DB::table("detalle_ventas")
            ->join("articulos", "detalle_ventas.idarticulo", "=", "articulos.id")
            ->select("detalle_ventas.*", "articulos.nombre as nombreArticulo", "articulos.precio_venta as precioVenta", "articulos.codigo as codigoArticulo")
            ->where("detalle_ventas.idventa", "=", $id)
            ->get();

        return view("ventas.show",compact("venta", "articulos"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Ventas::find($id);
        $venta->delete();
        return redirect()->route('ventas.list'); 
    }
}
