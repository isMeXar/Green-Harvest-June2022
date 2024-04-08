<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dechet extends Model
{
    protected $fillable = [
        'harvest_id', 
        'client_id', 
        'caisse_dechet', 
        'poids_dechet', 
        'prix',
        'prix_total',
        'created_at', 
        'updated_at'
    ];

    public function harvests()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id', 'id');
    }
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    
    use HasFactory;
}
