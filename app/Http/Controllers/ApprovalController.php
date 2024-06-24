<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appf = Mahasiswa::orderBy('created_at', "ASC")->get();
        return view('fakultas.daftar.index',compact('appf'));
    }

    public function approve_apply($id)
    {
        $data = Mahasiswa::find($id);

        $data->status1='Approved';

        $data->save();

        return redirect()->back();
    }

    public function deny_apply($id)
    {
        $data = Mahasiswa::find($id);

        $data->status1='Denied';

        $data->save();

        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'File not found.');
        }

        $filePath = storage_path('app/public/' . $mahasiswa->dokumen);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        return response()->download($filePath);
    }

}


