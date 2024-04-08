<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVarietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varietes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('culture_id');
            $table->foreign('culture_id')->references('id')->on('cultures');
            $table->string('variete')->unique();
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
        Schema::dropIfExists('varietes');
    }
}
