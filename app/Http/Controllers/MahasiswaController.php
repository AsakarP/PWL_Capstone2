<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Beasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beas = Beasiswa::orderBy('created_at', "ASC")->get();
        $mas = Mahasiswa::orderBy('created_at', "ASC")->get();
        return view('mahasiswa.index',compact('mas','beas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Beasiswa::create($request->all());
        Mahasiswa::create($request->all());

        return redirect()->route('mas-index')->with('success','Pengajuan Berhasil Ditambahkan');
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
    public function edit(Request $request, $nomas)
    {
        $mas = Mahasiswa::find($nomas);
    
        if (!$mas) {
            return redirect()->back()->with('error', 'Pengajuan gagal');
        }
    
        return view('admin.beasiswa.edit', compact('mas'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nomas)
    {
        $mas = Mahasiswa::find($nomas);
    
       
        $mas->update($request->all());

        
        return redirect()->route('mab-index')->with('success','Pengajuan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $nomas)
    {
        $bea = Beasiswa::find($nomas);
    
        if (!$bea) {
            return redirect()->back()->with('error', 'Beasiswa tidak ada');
        }

        $bea->delete();

        return redirect()->route('mab-index')->with('success','Beasiswa Berhasil Dihapus');
    }
}
