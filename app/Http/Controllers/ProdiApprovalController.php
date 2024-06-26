<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ProdiApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appf = Mahasiswa::orderBy('created_at', "ASC")->get();
        return view('prodi.daftar.index',compact('appf'));
    }

    public function proa_approve_apply($id)
    {
        $data = Mahasiswa::find($id);

        $data->status2='Approved';

        $data->save();

        return redirect()->back();
    }

    public function proa_deny_apply($id)
    {
        $data = Mahasiswa::find($id);

        $data->status2='Denied';

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
        //
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
}
