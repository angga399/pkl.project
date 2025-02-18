<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'birth_date', 'nik', 'major','PT', 'phone_number', 'location_pkl', 'email', 'password'
    ];
}
