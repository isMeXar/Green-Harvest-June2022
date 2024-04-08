<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = [
        'harvest_id', 
        'client_id', 
        'caisse_com',
        'poids_com', 
        'poids_net', 
        'prix',
        'prix_total',
        'created_at', 
        'updated_at'
    ];

    public function harvests()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    
    use HasFactory;
}
