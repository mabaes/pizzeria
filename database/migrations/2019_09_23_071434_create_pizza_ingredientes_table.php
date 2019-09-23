<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('pizing_id');
            $table->bigInteger('pizing_idPizza');
            $table->bigInteger('pizing_idIngrediente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredientes');
    }
}
