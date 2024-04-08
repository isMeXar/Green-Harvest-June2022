<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFermesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fermes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('domaine_id');
            $table->foreign('domaine_id')->references('id')->on('domaines');
            $table->string('ferme');
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
        Schema::dropIfExists('fermes');
    }
}
