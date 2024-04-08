<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recolte_id');
            $table->foreign('recolte_id')->references('id')->on('recoltes')->cascadeOnDelete();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
            $table->Integer('caisse_com');
            $table->float('poids_com');
            $table->decimal('prix')->nullable();
            $table->decimal('prix_total')->nullable();
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
        Schema::dropIfExists('exports');
    }
}
