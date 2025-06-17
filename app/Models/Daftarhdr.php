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
         'user_id',
        'company_id',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
}


// 

// Cara pakai:
// Daftarhdr::filterByCompany(auth()->user()->company_id)->get();
}
