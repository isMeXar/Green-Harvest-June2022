<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serre_id');
            $table->foreign('serre_id')->references('id')->on('serres')->cascadeOnDelete();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->cascadeOnDelete();
            $table->unsignedBigInteger('porte_greffe_id');
            $table->foreign('porte_greffe_id')->references('id')->on('porte_greffes')->cascadeOnDelete();
            $table->string('reference_technique')->nullable();
            $table->string('status')->nullable();
            $table->string('mode_plantation')->nullable();
            $table->string('zone')->nullable();
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
        Schema::dropIfExists('parcelles');
    }
}
