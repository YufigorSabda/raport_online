<?php

namespace App\Http\Controllers\DataSekolah;

use App\Http\Controllers\Controller;
use App\Models\RefSekolahKepala;
use Illuminate\Http\Request;

class KepalaSekolahController extends Controller
{
    private function validasi_data(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'string',  'max:30'],
            'gelar_depan' => ['required', 'string', 'max:50'],
            'gelar_belakang' => ['required', 'string', 'max:50'],
            'nama' => ['required', 'string', 'max:100']
        ]);
        return $validatedData;
    }

    public function index()
    {
        $data = RefSekolahKepala::where('id_sekolah', 1)->first();
        $nama_lengkap = trim("{$data->gelar_depan} {$data->nama} {$data->gelar_belakang}");

        return view('backend.data-sekolah.kepala-sekolah', compact('data', 'nama_lengkap'));
    }

    public function update(Request $request, string $id = '1')
    {
        $validatedData = $this->validasi_data($request);
        $kepala_sekolah = RefSekolahKepala::findOrFail($id);

        try {
            $kepala_sekolah->update($validatedData);

            $request->session()->flash('message', "Berhasil mengupdate data.");
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }

        return back();
    }
}
