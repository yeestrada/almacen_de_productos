<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'laptops';
    protected $fillable = [
        'procesador',
        'ram',
        'id_product'
    ];

    //----------------relations--------------------
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
