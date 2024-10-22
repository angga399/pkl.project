<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'hari_tgl',
        'jam_datang',
        'jam_pulang',
        'paraf_pembimbing',
    ];
}
