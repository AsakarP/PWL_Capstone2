<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_fakultas',
        'nama_fakultas',
        'dekan',
    ];
}
