<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id'); // le type doit correspondre au type de la clé primaire de la table authors
            $table->unsignedBigInteger('product_id');
            // On met une cascade si on supprime un auteurs on supprime les informations dans la table de liaison 
            // En effet ces informations sont inutiles ils ne servent qu'à relier les deux tables si un auteur disparaît de 
            // la base de données l'information dans la table de liaison n'a plus de sens.
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
};
