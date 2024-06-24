<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mas = Mahasiswa::orderBy('created_at', "ASC")->get();
        return view('mahasiswa.history.index',compact('mas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:25',
            'dokumen' => 'required|file',
            'ipk' => 'required|string',
            'poin' => 'required|string',
        ]);
    
        Mahasiswa::create($request->all());
    
        return redirect()->route('mah-index')->with('success', 'Pengajuan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ma = Mahasiswa::find($id);
    
        if (!$ma) {
            return redirect()->back()->with('error', 'Pengajuan tidak ada');
        }
    
        return view('mahasiswa.history.edit', compact('ma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ma = Mahasiswa::findOrFail($id);
    
       
        $ma->update($request->all());

        
        return redirect()->route('mah-index')->with('success','Pengajuan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ma = Mahasiswa::findOrFail($id);

        $ma->delete();

        return redirect()->route('mah-index')->with('success','Pengajuan Berhasil Dihapus');
    }
}
