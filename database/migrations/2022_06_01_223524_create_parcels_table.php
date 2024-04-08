<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serre_id');
            $table->foreign('serre_id')->references('id')->on('serres')->cascadeOnDelete();
            $table->unsignedBigInteger('culture_id');
            $table->foreign('culture_id')->references('id')->on('cultures')->cascadeOnDelete();
            $table->string('reference_technique')->nullable();
            $table->string('status')->nullable();
            $table->string('mode_plantation')->nullable();
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
        Schema::dropIfExists('parcels');
    }
}
