<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recoltes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parcelle_id');
            $table->foreign('parcelle_id')->references('id')->on('parcelles')->cascadeOnDelete();
            $table->unsignedBigInteger('unite_id');
            $table->foreign('unite_id')->references('id')->on('unites')->cascadeOnDelete();
            $table->Integer('caisse_net');
            $table->float('poids_net');
            $table->date('date_recolte');
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
        Schema::dropIfExists('recoltes');
    }
}
