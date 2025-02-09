<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPembimbingPkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'leader_name', 'supervisor_name', 'phone', 'company_address', 'company_email', 'company_phone', 'email', 'password'
    ];
}
