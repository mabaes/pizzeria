<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    
	protected $table = 'pizzas';
    protected $primaryKey = 'piz_id';

    //
    protected $fillable = [
        'piz_nombre', 'piz_imagen' 
    ];
}




