<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){

        $productos    =   Articulos::all();
        return view('venta.index',compact('productos'));

    }
}
