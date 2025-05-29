<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'journal_id',
        'action',
        'changes',
    ];

   // Di model JournalHistory.php
public function journal()
{
    return $this->belongsTo(Journal::class);
}


}