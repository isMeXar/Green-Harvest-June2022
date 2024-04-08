<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    protected $fillable = [
        'variete_id',
        'porte_greffe_id',
        'culture',
        'created_at',
        'updated_at'
    ];

    public function varietes()
    {
        return $this->belongsTo(Variete::class, 'variete_id', 'id');
    }

    public function porte_greffe()
    {
        return $this->belongsTo(Porte_greffe::class, 'porte_greffe_id', 'id');
    }
}
