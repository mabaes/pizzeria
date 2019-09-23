<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    //
    protected $table = 'ingredientes';
    protected $primaryKey = 'ing_id';

    //
    protected $fillable = [
        'ing_nombre', 'ing_precio' 
    ];
}
