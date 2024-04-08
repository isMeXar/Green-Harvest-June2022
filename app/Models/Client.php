<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'pays',
        'telephone',
        'gsm',
        'fax',
        'email',
        'ice',
        'if',
        'code_externe',
        'observation',
        'type',
        'created_at',
        'updated_at'
    ];
}
