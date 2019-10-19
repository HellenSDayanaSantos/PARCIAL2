<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Pelicula;

class LikeController extends Controller
{
      public function index()
    {
        $pelicula = Pelicula::with('likes')->get();
        return $pelicula;
     // return csrf_token();
    }

     public function store(Request $request)
    {
        
    
      $pelicula = Pelicula::find($request->codigo);
       

       $like  = new Like;
       $like2 = new Like;

       $like->me_gusta   = $request->me_gusta;
       $like2->me_gusta  = $request->me_gusta2;
            
       $pelicula->likes()->saveMany([$like,$like2]);

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

      $like = Like::find($request->codigolike);

      $like->me_gusta  = $request->me_gusta;
      
      $like->update();

    } 

    public function destroy($id)
     {
     
     $like = Like::find($id);
     
     $like->delete();

     }  

}
