<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('precommande_id');
            $table->foreignId('produit_id');
            $table->foreignId("user_id")->nullable();
            $table->foreignId("company_id")->nullable();
            $table->bigInteger('quantity_commande');
            $table->boolean('status')->default(false);
            $table->bigInteger('reduction')->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
