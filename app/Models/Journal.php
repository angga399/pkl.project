<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class)->withDefault([
        'full_name' => 'User Tidak Ditemukan',
        'major' => '-'
    ]);
}
    protected $fillable = [
        'judul_jurnal',
        'tanggal',
        'nama',
        'kelas',
        'PT',
        'uraian_konsentrasi',
    ];

    // Di model Journal.php
public function histories()
{
    return $this->hasMany(JournalHistory::class);
}
}

