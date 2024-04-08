<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ferme_id');
            $table->foreign('ferme_id')->references('id')->on('fermes')->cascadeOnDelete();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->cascadeOnDelete();
            $table->unsignedBigInteger('porte_greffe_id');
            $table->foreign('porte_greffe_id')->references('id')->on('porte_greffes')->cascadeOnDelete();
            $table->string('parcelle');
            $table->string('reference_technique')->nullable();
            $table->string('status');
            $table->string('mode_plantation');
            $table->string('zone');
            $table->float('densite')->nullable();
            $table->float('ecartement')->nullable();
            $table->bigInteger('nombre_plants');
            $table->float('superficie')->nullable();
            $table->date('date_debut_travaux');
            $table->date('date_surgreffage')->nullable();
            $table->date('date_arrachage')->nullable();
            $table->date('date_fin_recolte')->nullable();
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
        Schema::dropIfExists('serres');
    }
}
