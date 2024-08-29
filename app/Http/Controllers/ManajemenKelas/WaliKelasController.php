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
            'ref_kelas',
            'ref_tingkat',
            'ref_tahun_ajaran'
        ])->get();

        return view('backend.wali_kelas.index', compact('data'));
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
