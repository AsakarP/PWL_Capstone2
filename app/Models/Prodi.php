<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataFakultas;

class Prodi extends Model
{
    public function create()
    {
        $fakultas = Fakultas::all(); 
        return view('admin.beasiswa.create', compact('fakultas'));
    }
}
