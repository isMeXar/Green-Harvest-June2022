<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    protected $fillable = [
        'serre_id',
        'produit_id',
        'porte_greffe_id',
        'reference_technique',
        'densite',
        'ecartement',
        'nombre_plants',
        'superficie',
        'status',
        'mode_plantation',
        'zone',
        'date_debut_travaux',
        'date_surgreffage',
        'date_arrachage',
        'date_fin_recolte',
        'created_at',
        'updated_at'
    ];

    public function ferme()
    {
        return $this->belongsTo(Ferme::class, 'ferme_id', 'id');
    }
    public function serre()
    {
        return $this->belongsTo(Serre::class, 'serre_id', 'id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'id');
    }
    public function porte_greffe()
    {
        return $this->belongsTo(Porte_greffe::class, 'porte_greffe_id', 'id');
    }
}
