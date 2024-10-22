<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_jurnal',
        'tanggal',
        'nama',
        'uraian_konsentrasi',
    ];
}

