<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idBeasiswa';

    protected $fillable = [
        'idBeasiswa',
        'namaBeasiswa',
        'jenisBeasiswa',
        'periode_id'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
