<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $table = 'shoes';
    protected $fillable = [
        'material',
        'numero',
        'id_product'
    ];

    //----------------relations--------------------
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
