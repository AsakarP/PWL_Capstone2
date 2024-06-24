<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use App\Models\Periode;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beas = Beasiswa::orderBy('created_at', "ASC")->get();
        $pers = Periode::orderBy('created_at', "ASC")->get();
        return view('admin.beasiswa.index',compact('beas','pers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pers = Periode::orderBy('created_at', "ASC")->get();
        return view('admin.beasiswa.create',compact('pers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'idBeasiswa',
        //     'namaBeasiswa' => 'required|string|max:25',
        //     'jenisBeasiswa' => 'required|string',
        //     'periode_id' => 'required|exists:periodes,id',
        // ]);
    
        Beasiswa::create($request->all());
    
        return redirect()->route('ab-index')->with('success', 'Beasiswa Berhasil Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $idBeasiswa)
    {
        // $beas = Beasiswa::find($idBeasiswa);
        // $pers = Periode::orderBy('created_at', "ASC")->get();
    
        // if (!$beas) {
        //     return redirect()->back()->with('error', 'Beasiswa tidak ada');
        // }

        $beas = Beasiswa::findOrFail($idBeasiswa);
        $pers = Periode::orderBy('created_at', "ASC")->get();
    
        return view('admin.beasiswa.edit', compact('beas','pers'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $idBeasiswa)
    {
        // $request->validate([
        //     'namaBeasiswa' => 'required|string|max:25',
        //     'jenisBeasiswa' => 'required|string',
        // ]);
    
        $beas = Beasiswa::findOrFail($idBeasiswa);

        $beas->update($request->all());
    
        return redirect()->route('ab-index')->with('success', 'Beasiswa Berhasil Diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $idBeasiswa)
    {
        // $beas = Beasiswa::find($idBeasiswa);
    
        // if (!$beas) {
        //     return redirect()->back()->with('error', 'Beasiswa tidak ada');
        // }
        $beas = Beasiswa::findOrFail($idBeasiswa);

        $beas->delete();

        return redirect()->route('ab-index')->with('success','Beasiswa Berhasil Dihapus');
    }
}
