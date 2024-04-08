<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays')->nullable();
            $table->string('telephone');
            $table->string('gsm')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('ice')->nullable();
            $table->string('code_externe')->nullable();
            $table->string('if')->nullable();
            $table->string('observation')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('clients');
    }
}
