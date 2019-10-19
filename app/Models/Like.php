<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    
    protected $fillable = [
        'me_gusta'
    ];

    public function likable()
    {
        return $this->morphTo();
    }
}
