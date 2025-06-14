<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarhdr extends Model
{
    use HasFactory;

   public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'daftarhdrs';

    protected $fillable = [
        'tipe',
        'hari',
        'nama',
        'pt',
        'tanggal',
        'latitude',
        'longitude',
        'dataGambar',
        'status',
        'alasan_penolakan', 
    ];

}
