<?php

namespace App\Http\Controllers\DataSekolah;

use App\Http\Controllers\Controller;
use App\Models\RefSekolah;
use App\Models\RefSekolahAlamat;
use App\Models\RefSekolahKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    private function validasi_data(Request $request)
    {
        $validatedData = $request->validate([
            // Data sekolah
            'jenjang' => ['required', 'string', 'max:50'],
            'npsn' => ['required', 'string', 'max:50'],
            'nss' => ['required', 'string', 'max:50'],
            'nama_sekolah' => ['required', 'string', 'max:100'],

            // Data alamat
            'jalan' => ['required', 'string', 'max:100'],
            'desa' => ['required', 'string', 'max:100'],
            'kecamatan' => ['required', 'string', 'max:100'],
            'kabupaten' => ['required', 'string', 'max:100'],
            'provinsi' => ['required', 'string', 'max:100'],
            'kode_pos' => ['required', 'string', 'max:100'],

            // Data kontak
            'nomor_telepon' => ['required', 'string', 'max:30'],
            'nomor_fax' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'max:100'],
            'website' => ['required', 'string', 'max:100']
        ]);
        return $validatedData;
    }

    public function index()
    {
        $data = RefSekolah::with([
            'ref_sekolah_alamat',
            'ref_sekolah_kontak'
        ])->findOrFail(1);
        return view('backend.data-sekolah.sekolah', compact('data'));
    }

    public function update(Request $request, string $id = '1')
    {
        $validatedData = $this->validasi_data($request);
        try {
            DB::beginTransaction();
            $sekolah = RefSekolah::findOrFail($id);
            $sekolah->update($validatedData);
            $sekolah->ref_sekolah_alamat->update($validatedData);
            $sekolah->ref_sekolah_kontak->update($validatedData);
            DB::commit();

            $request->session()->flash('message', 'Berhasil mengupdate data');
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }
}
