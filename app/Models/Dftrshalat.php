<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dftrshalat extends Model
{
    use HasFactory;

    protected $fillable = [  
        'user_id',
        'jenis',
        'nama', 
        'perusahaan',
        'tanggal',
         'hari', 
         'waktu',
          'status'];



// Di model Dftrshalat
public function user()
{
    return $this->belongsTo(User::class);
}

// In Dftrshalat model
public function scopeForUser($query, $userId)
{
    return $query->where('user_id', $userId);
}

public function scopeForCompany($query, $companyId)
{
    return $query->whereHas('user', function($q) use ($companyId) {
        $q->where('company_id', $companyId);
    });
}

}