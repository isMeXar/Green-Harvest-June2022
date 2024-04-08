<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolte extends Model
{
    protected $fillable = [
        'parcelle_id', 
        'unite_id', 
        'caisse_net', 
        'poids_net', 
        'date_recolte',
        'created_at', 
        'updated_at'
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class, 'parcelle_id', 'id');
    }

    public function unite()
    {
        return $this->belongsTo(Unite::class, 'unite_id', 'id');
    }
}
