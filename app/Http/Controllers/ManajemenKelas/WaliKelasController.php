<?php

namespace App\Http\Controllers\ManajemenKelas;

use App\Http\Controllers\Controller;
use App\Models\RefKelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $data = RefKelas::with([
            'ref_guru.user',
            'ref_tingkat',
            'ref_tahun_ajaran'
        ])->get();
        //return $data;
        return view('backend.wali_kelas.index', compact('data'));
    }

    public function edit($id)
    {
        $data = RefKelas::with([
            'ref_guru.user',
            'ref_tingkat',
            'ref_tahun_ajaran'
        ])->findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id' => ['required'],
            'id_guru' => ['required', 'exists:ref_guru,id']
        ]);
        $ref_kelas = RefKelas::findOrFail($id);

        try {
            $ref_kelas->id_guru = $validatedData['id_guru'];
            $ref_kelas->save();

            $request->session()->flash('message', 'Berhasil mengedit wali kelas');
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            $request->session()->flash('message', 'Terjadi kesalahan. ' . $e->getMessage());
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }
}
