<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    protected $fillable = ['conteneur','unite_par_kg', 'created_at', 'updated_at'];
    
}
