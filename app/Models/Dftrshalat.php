<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dftrshalat extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'dftrshalats';

    // Kolom-kolom yang boleh diisi secara massal
   
   // Dftrshalat.php (Model)
protected $fillable = ['type', 'tanggal', 'hari', 'waktu', 'status'];

}
