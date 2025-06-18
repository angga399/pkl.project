<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Journal extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class)->withDefault([
        'full_name' => 'User Tidak Ditemukan',
        'major' => '-'
    ]);
            return $this->belongsTo(User::class, 'user_id');
}
    protected $fillable = [
        'judul_jurnal',
        'tanggal',
        'nama',
        'kelas',
        'PT',
        'uraian_konsentrasi',
        'user_id',
        'status', // jika kamu menyimpan status seperti "Menunggu", "Disetujui", dsb.
    ];

    /**
     * Relasi ke histori jurnal.
     */
    public function histories()
    {
        return $this->hasMany(JournalHistory::class);
    }

    /**
     * Relasi ke user yang membuat jurnal.
     */
  
}
