<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $period = Periode::orderBy('created_at', "ASC")->get();
        return view('fakultas.periode.index',compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'string|max:25',
            'namaperiode' => 'required|string|max:16',
            'tglmulai' => 'required|date',
            'tglakhir' => 'required|date|after:dateopened'
        ]);
    
        Periode::create($request->all());
    
        return redirect()->route('fak-index')->with('success', 'Periode Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $per = Periode::find($id);
    
        if (!$per) {
            return redirect()->back()->with('error', 'Periode tidak ada');
        }
    
        return view('fakultas.periode.edit', compact('per'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaperiode' => 'required|string|max:16',
            'tglmulai' => 'required|date',
            'tglakhir' => 'required|date|after:dateopened'
        ]);
    
        $per = Periode::findOrFail($id);
        $per->update($request->all());
    
        return redirect()->route('fak-index')->with('success', 'Periode Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $per = Periode::find($id);
    
        if (!$per) {
            return redirect()->back()->with('error', 'Periode tidak ada');
        }

        $per->delete();

        

        return redirect()->route('fak-index')->with('success', 'Periode Berhasil Dihapus');
    }
}
