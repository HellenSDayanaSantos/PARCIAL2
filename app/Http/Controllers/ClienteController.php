<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Tarjeta;


class ClienteController extends Controller
{
     public function index()
    {
        $cliente = Cliente::with('tarjeta')->get();
        return $cliente;
      //return csrf_token();
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;

        $cliente->nombres = $request->nombres;
        $cliente->correo  = $request->correo;
        $cliente->genero  = $request->genero;
        $cliente->edad    = $request->edad;

        $cliente->save();

        $tarjeta = new Tarjeta;

        $tarjeta->banco       = $request->banco;
        $tarjeta->nro_tarjeta = $request->nro_tarjeta;
        
        $cliente->tarjeta()->save($tarjeta);

     }
        public function update(Request $request,$id)
        {

        $cliente = Cliente::find($id);

        $cliente->nombres = $request->nombres;
        $cliente->correo  = $request->correo;
        $cliente->genero  = $request->genero;
        $cliente->edad    = $request->edad;

        $cliente->update();

        $tarjeta['banco']       = $request->banco;
        $tarjeta['nro_tarjeta'] = $request->nro_tarjeta;
       
        $cliente->tarjeta()->update($tarjeta);
    }
  }

