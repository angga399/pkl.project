<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dftrshalat extends Model
{
    use HasFactory;

    protected $fillable = ['jenis','nama', 'perusahaan','tanggal', 'hari', 'waktu', 'status'];
}