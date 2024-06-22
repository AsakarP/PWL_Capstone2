<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beas = Beasiswa::orderBy('created_at', "ASC")->get();
        return view('admin.beasiswa.index',compact('beas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.beasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaBeasiswa' => 'required|string|max:25',
            'jenisBeasiswa' => 'required|string',
        ]);
    
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
        $bea = Beasiswa::find($idBeasiswa);
    
        if (!$bea) {
            return redirect()->back()->with('error', 'Beasiswa tidak ada');
        }
    
        return view('admin.beasiswa.edit', compact('bea'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $idBeasiswa)
    {
        $request->validate([
            'namaBeasiswa' => 'required|string|max:25',
            'jenisBeasiswa' => 'required|string',
        ]);
    
        $bea = Beasiswa::findOrFail($idBeasiswa);
        $bea->update($request->all());
    
        return redirect()->route('ab-index')->with('success', 'Beasiswa Berhasil Diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $idBeasiswa)
    {
        $bea = Beasiswa::find($idBeasiswa);
    
        if (!$bea) {
            return redirect()->back()->with('error', 'Beasiswa tidak ada');
        }

        $bea->delete();

        return redirect()->route('ab-index')->with('success','Beasiswa Berhasil Dihapus');
    }
}
