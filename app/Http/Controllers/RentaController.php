<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pelicula;


class RentaController extends Controller
{
      public function index()
    {
        $pelicula = Pelicula::with('clientes')->get();
        //return $pelicula;
        return csrf_token();
    }

     public function store(Request $request)
    {
      $pelicula = Pelicula::find($request->codigo);
      $pelicula->clientes()->attach([$request->codigocliente]);     
    }

    public function Update(Request $request,$id)
     {
      $pelicula = Pelicula::find($id);
      $pelicula->clientes()->sync([$request->codigocliente]);

     }

}
