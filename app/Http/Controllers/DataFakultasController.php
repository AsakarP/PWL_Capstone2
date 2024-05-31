<?php

namespace App\Http\Controllers;
use App\Models\DataFakultas;
use Illuminate\Http\Request;

class DataFakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fks = DataFakultas::orderBy('created_at', "DESC")->get();
        return view('admin.fakultas.index',compact('fks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DataFakultas::create($request->all());

        return redirect()->route('afk-index')->with('success','Mata Kuliah Berhasil Ditambahkan');
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
        $fk = DataFakultas::findOrFail($id);
        
        return view('admin.fakultas.edit' , compact('fk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fk = DataFakultas::findOrFail($id);
    
       
        $fk->update($request->all());

        
        return redirect()->route('afk-index')->with('success','User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fk = DataFakultas::findOrFail($id);

        $fk->delete();

        return redirect()->route('afk-index')->with('success','User Berhasil Dihapus');
    }
}
