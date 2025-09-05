<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_recipe', function (Blueprint $table) {
            $table->id();

            $table->integer('weight')->nullable();

            $table->foreignId('product_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('recipe_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->unique(['product_id', 'recipe_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_recipe');
    }
}
