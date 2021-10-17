<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'logins';
    protected $primaryKey = 'employeeNumber';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'employeeNumber',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'emp_verified_at' => 'datetime',
    ];
}