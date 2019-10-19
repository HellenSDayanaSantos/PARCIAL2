<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjetas';

    protected $fillable = [
        'banco',
        'nro_tarjeta',
        'cliente_id',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    
}
