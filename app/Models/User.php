<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use Notifiable;
    
        protected $fillable = [
            'full_name',
            'birth_date',
            'major',
            'PT',
            'phone_number',
            'location_pkl',
            'company_name',
            'leader_name',
            'supervisor_name',
            'phone',
            'company_address',
            'company_email',
            'company_phone',
            'email',
            'password',
            'company_id'
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

