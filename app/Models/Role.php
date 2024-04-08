<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role',
        'afficher_statistics',
        'gerer_parcelle',
        'gerer_produit',
        'gerer_client',
        'ajouter_recolte',
        'modifier_recolte',
        'supprimer_recolte',
        'gerer_export',
        'gerer_dechet',
        'gerer_profile',
        'ajouter_utilisateur',
        'modifier_utilisateur',
        'supprimer_utilisateur',
        'gerer_role',
        'created_at',
        'updated_at',
    ];
}
