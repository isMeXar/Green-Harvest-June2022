<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parcel_id');
            $table->foreign('parcel_id')->references('id')->on('parcels')->cascadeOnDelete();
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
