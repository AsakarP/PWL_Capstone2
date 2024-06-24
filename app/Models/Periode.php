<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'namaperiode',
        'tglmulai',
        'tglakhir',
    ];
}
