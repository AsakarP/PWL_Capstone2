<?php

namespace App\Http\Controllers;

use App\Models\DataProdi;
use Illuminate\Http\Request;

class DataProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pss = DataProdi::orderBy('created_at', "ASC")->get();
        return view('admin.prodi.index',compact('pss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DataProdi::create($request->all());

        return redirect()->route('ap-index')->with('success','Data Prodi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataProdi $dataProdi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataProdi $dataProdi, $id)
    {
        $pss = DataProdi::findOrFail($id);
        
        return view('admin.prodi.edit' , compact('pss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataProdi $dataProdi, string $id)
    {
        $pss = DataProdi::findOrFail($id);
       
        $pss->update($request->all());

        return redirect()->route('ap-index')->with('success','Data Prodi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataProdi $dataProdi, $id)
    {
        $pss = DataProdi::findOrFail($id);

        $pss->delete();

        return redirect()->route('ap-index')->with('success','Data Prodi Berhasil Dihapus');
    }
}
