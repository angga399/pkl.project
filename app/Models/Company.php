<?php

// app/Models/Company.php
// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Tambahkan ini:
    protected $fillable = ['name', 'address', 'phone'];

    public function supervisors()
    {
        return $this->hasMany(User::class)->where('role', 'pembimbingpkl');
    }

    public function students()
    {
        return $this->hasMany(User::class)->where('role', 'siswa');
    }

    public function daftarhdrs()
{
    return $this->hasMany(Daftarhdr::class, 'company_id');
}

}
