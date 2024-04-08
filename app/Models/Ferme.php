<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
    protected $fillable = [
        'domaine_id',
        'ferme',
        'created_at',
        'updated_at'
    ];

    public function domaines()
    {
        return $this->belongsTo(Domaine::class, 'domaine_id', 'id');
    }
}
