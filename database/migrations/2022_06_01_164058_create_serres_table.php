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
            $table->foreign('ferme_id')->references('id')->on('fermes');
            $table->string('serre');
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
