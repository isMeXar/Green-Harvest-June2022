<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('variete_id');
            $table->foreign('variete_id')->references('id')->on('varietes');
            $table->unsignedBigInteger('porte_greffe_id');
            $table->foreign('porte_greffe_id')->references('id')->on('porte_greffes')->cascadeOnDelete();
            $table->string('culture');
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
        Schema::dropIfExists('cultures');
    }
}
