<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    protected $table = 'tvs';
    protected $fillable = [
        'tipo_pantalla',
        'tamano_pantalla',
        'id_product'
    ];

    //----------------relations--------------------
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
