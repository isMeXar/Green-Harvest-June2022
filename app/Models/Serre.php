<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serre extends Model
{
    protected $fillable = ['ferme_id', 'serre', 'created_at', 'updated_at'];

    public function fermes()
    {
        return $this->belongsTo(Ferme::class, 'ferme_id', 'id');
    }
}
