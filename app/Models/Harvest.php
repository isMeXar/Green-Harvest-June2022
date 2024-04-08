<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = [
        'parcel_id', 
        'unite_id', 
        'caisse_net', 
        'poids_net', 
        'date_recolte',
        'created_at', 
        'updated_at'
    ];

    public function parcels()
    {
        return $this->belongsTo(Parcel::class, 'parcel_id', 'id');
    }

    public function unite()
    {
        return $this->belongsTo(Unite::class, 'unite_id', 'id');
    }
    
    use HasFactory;
}
