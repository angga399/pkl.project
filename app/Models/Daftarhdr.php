<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarhdr extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'image_data',
        'notes',
    ];
}
