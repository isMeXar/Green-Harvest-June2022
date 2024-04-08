<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->String('role');
            $table->boolean('afficher_statistics')->default(false);
            $table->boolean('gerer_parcelle')->default(false);
            $table->boolean('gerer_produit')->default(false);
            $table->boolean('gerer_client')->default(false);
            $table->boolean('ajouter_recolte')->default(false);
            $table->boolean('modifier_recolte')->default(false);
            $table->boolean('supprimer_recolte')->default(false);
            $table->boolean('gerer_export')->default(false);
            $table->boolean('gerer_dechet')->default(false);
            $table->boolean('gerer_profile')->default(false);
            $table->boolean('ajouter_utilisateur')->default(false);
            $table->boolean('modifier_utilisateur')->default(false);
            $table->boolean('supprimer_utilisateur')->default(false);
            $table->boolean('gerer_role')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
