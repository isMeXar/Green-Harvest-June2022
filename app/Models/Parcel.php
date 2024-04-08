<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'serre_id',
        'culture_id',
        'reference_technique',
        'densite',
        'ecartement',
        'nombre_plants',
        'superficie',
        'status',
        'mode_plantation',
        'date_debut_travaux',
        'date_surgreffage',
        'date_arrachage',
        'date_fin_recolte',
        'created_at',
        'updated_at'
    ];

    public function fermes()
    {
        return $this->belongsTo(Ferme::class, 'ferme_id', 'id');
    }
    public function serres()
    {
        return $this->belongsTo(Serre::class, 'serre_id', 'id');
    }
    public function cultures()
    {
        return $this->belongsTo(Produit::class, 'culture_id', 'id');
    }
    
    use HasFactory;
}
