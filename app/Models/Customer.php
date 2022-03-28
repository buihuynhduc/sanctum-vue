<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table='customer';
    protected $fillable = [
        'name',
        'id',
        'password',
    ];
    protected $hidden=[
        'password',
        'remember_token',
    ];
}
