<?php

namespace App\Http\Controllers\ManajemenKelas;

use App\Http\Controllers\Controller;
use App\Models\RefKelas; // Pastikan model RefKelas sudah diimpor
use Illuminate\Http\Request;

class WaliKelas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = RefKelas::with('guru')->get();

        return view('manajemenkelas.index', ['kelas' => $kelas]);
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
