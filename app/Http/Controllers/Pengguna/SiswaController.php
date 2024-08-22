<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\RefAgama;
use App\Models\RefGender;
use App\Models\RefSiswa;
use App\Models\RefStatusDk;
use App\Models\RefTingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    private function validasi_data(Request $request)
    {
        $validatedData = $request->validate([
            // Data Siswa
            'nama_siswa' => 'required|string|max:50',
            'nis' => 'required|string|max:30',
            'nisn' => 'required|string|max:30',
            'nik' => 'required|string|max:30',
            'telp_rumah' => 'nullable|string|max:20',
            'telp_seluler' => 'nullable|string|max:20',
            'alamat' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'id_gender' => 'required|integer|exists:ref_gender,id',
            'id_agama' => 'required|integer|exists:ref_agama,id',
            'id_status_dk' => 'required|integer|exists:ref_status_dk,id',
            'anak_ke' => 'required|integer',
            'sekolah_asal' => 'required|string|max:50',
            'tgl_masuk' => 'required|date',
            'id_tingkat' => 'required|integer|exists:ref_tingkat,id',

            // Data Siswa Ortu
            'nama_ayah' => 'required|string|max:100',
            'pekerjaan_ayah' => 'required|string|max:50',
            'nama_ibu' => 'required|string|max:100',
            'pekerjaan_ibu' => 'required|string|max:50',
            'telp_ortu' => 'required|string|max:20',
            'alamat_ortu' => 'required|string|max:100',
            'nama_wali' => 'required|string|max:100',
            'pekerjaan_wali' => 'required|string|max:50',
            'telp_wali' => 'required|string|max:20',
            'alamat_wali' => 'required|string|max:100'
        ]);
        return $validatedData;
    }

    public function index()
    {
        $data = RefSiswa::with([
            'ref_siswa_ortu',
            'ref_gender',
            'ref_agama',
            'ref_status_dk',
            'ref_tingkat'
        ])->get();

        $referensi = [
            'ref_gender' => RefGender::all(),
            'ref_agama' => RefAgama::all(),
            'ref_status_dk' => RefStatusDk::all(),
            'ref_tingkat' => RefTingkat::all()
        ];
        return view('backend.student.index', compact('data', 'referensi'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validasi_data($request);
        try {
            DB::beginTransaction();
            $ref_siswa = RefSiswa::create($validatedData);
            $ref_siswa->ref_siswa_ortu()->create($validatedData);
            DB::commit();

            $request->session()->flash('message', 'Berhasil menambah siswa');
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            DB::rollback();

            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }

    public function edit(string $id)
    {
        $data = RefSiswa::with([
            'ref_siswa_ortu',
            'ref_gender',
            'ref_agama',
            'ref_status_dk',
            'ref_tingkat'
        ])->findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $this->validasi_data($request);
        $ref_siswa = RefSiswa::findOrFail($id);

        try {
            DB::beginTransaction();
            $ref_siswa->update($validatedData);
            $ref_siswa->ref_siswa_ortu->update($validatedData);

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

    public function destroy(string $id, Request $request)
    {
        $ref_siswa = RefSiswa::findOrFail($id);
        try {
            $ref_siswa->delete();

            $request->session()->flash('message', "Berhasil menghapus data");
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }
}
