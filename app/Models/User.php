<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
    use Illuminate\Auth\Authenticatable as AuthenticableTrait;
    use Illuminate\Auth\Passwords\CanResetPassword;
    use Illuminate\Contracts\Auth\CanResetPassword as
               CanResetPasswordContract;
               use Illuminate\Notifications\Notifiable;

class User extends Model implements
Authenticatable,CanResetPasswordContract        

{
use AuthenticableTrait,CanResetPassword;
use Notifiable;

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

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
