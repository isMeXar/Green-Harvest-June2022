<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = [
        'role_id',
        'nom',
        'prenom',
        'telephone',
        'pays',
        'ville',
        'adresse',
        'code_postal',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
