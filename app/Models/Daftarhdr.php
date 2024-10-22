<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarhdr extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari', 
        'tanggal', 
        'jam_datang', 
        'jam_pulang', 
        'paraf_pembimbing'
    ];
}
