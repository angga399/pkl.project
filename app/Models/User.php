<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
      // app/Models/User.php
protected $fillable = [
    'role',
    'full_name',
    'email',
    'password',
    'company_id',
    'birth_date',
    'major',
    'PT', 
    'phone_number',
    'location_pkl',
    'nip',
    'rank',
    'company_address'
];
    
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function company()
{
    return $this->belongsTo(Company::class);
}
}

