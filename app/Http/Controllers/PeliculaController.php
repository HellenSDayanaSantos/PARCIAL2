<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Categoria;

class PeliculaController extends Controller
{
      public function index()
    {
        $pelicula = Pelicula::with('categorias')->get();
        return $pelicula;
        //return csrf_token();
    }

    public function store(Request $request)
    {
        $pelicula = new Pelicula;

        $pelicula->titulo        = $request->titulo;
        $pelicula->sipnosis      = $request->sipnosis;
        $pelicula->duracion      = $request->duracion;
        $pelicula->clasificacion = $request->clasificacion; 
        $pelicula->puntuacion    = $request->puntuacion;

        $pelicula->save();

        $categoria  = new Categoria;
        $categoria2 = new Categoria;

        $categoria->nombre  = $request->nombre;
        
        $categoria2->nombre  = $request->nombre2;
           
        $pelicula->categorias()->saveMany([$categoria,$categoria2]);

    }

     public function Update(Request $request,$id)
     {
      
       $pelicula = Pelicula::find($id);

       $pelicula->titulo        = $request->titulo;
       $pelicula->sipnosis      = $request->sipnosis;
       $pelicula->duracion      = $request->duracion;
       $pelicula->clasificacion = $request->clasificacion; 
       $pelicula->puntuacion    = $request->puntuacion;

       $pelicula->update();

      $categoria = Categoria::find($request->codigocategoria);

      $categoria->nombre  = $request->nombre;      

      $categoria->update();
       

     }

}
