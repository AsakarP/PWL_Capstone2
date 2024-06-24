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
        return view('mahasiswa.pengajuan.index',compact('mas','beas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $beas = Beasiswa::orderBy('created_at', "ASC")->get();
        $mas = Mahasiswa::orderBy('created_at', "ASC")->get();
        return view('mahasiswa.pengajuan.create',compact('beas','mas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dokumen' => 'required|file', // adjust the validation rules as needed
            'ipk' => 'required|string',
            'poin' => 'required|string',
        ]);
    
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filePath = $file->store('dokumen', 'public');
            
            Mahasiswa::create([
                'dokumen' => $filePath,
                'ipk' => $request->input('ipk'),
                'poin' => $request->input('poin'),
                'status1' => 'Processed',
                'status2' => 'Processed',
                // other fields...
            ]);
    
            return redirect()->route('mab-index')->with('success', 'Pengajuan Berhasil Ditambahkan');
        }
    
        return redirect()->back()->with('error', 'Dokumen is required.');
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
    public function edit(Request $request, $id)
    {
        
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
       
    }
}
