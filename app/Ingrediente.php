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

    
    public function pizzas() {
   		return $this->belongsToMany('App\Pizza', 'pizza_ingredientes', 'pizing_idIngrediente', 'pizing_idPizza');
   }
   


}
