<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriAbsen extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
        'hari',
        'tanggal',
        'latitude',
        'longitude',
        'data_gambar',
    ];
    // Di dalam model HistoriAbsen
public function daftarhdr()
{
    return $this->belongsTo(Daftarhdr::class);
}

}
