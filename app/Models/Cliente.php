<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'correo',
        'genero',
        'edad',
    ];

    public function tarjeta()
    {
        return $this->hasOne('App\Models\Tarjeta');
    }

    public function peliculas()
    {
        return $this->belongsToMany('App\Models\Pelicula','rentas')->withTimestamps();
    }

}
