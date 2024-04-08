<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'culture_id',
        'variete_id',
        'produit',
        'created_at',
        'updated_at'
    ];

    
    public function cultures()
    {
        return $this->belongsTo(Culture::class, 'culture_id', 'id');
    }
    public function varietes()
    {
        return $this->belongsTo(Variete::class, 'variete_id', 'id');
    }
}
