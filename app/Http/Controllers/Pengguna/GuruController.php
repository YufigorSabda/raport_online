<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\RefGender;
use App\Models\RefGuru;
use App\Models\RefPtk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    private function validasi_data(Request $request)
    {
        $validatedData = $request->validate([
            // Tabel Users
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',

            // Tabel RefGuru
            'nik' => 'required|string|max:50',
            'gelar_depan' => 'required|string|max:50',
            'gelar_belakang' => 'required|string|max:50',
            'id_ptk' => 'required|int|exists:ref_ptk,id',
        ]);
        return $validatedData;
    }

    public function index()
    {
        $data = RefGuru::with([
            'ref_ptk',
            'user'
        ])->get();

        $referensi = [
            'ref_gender' => RefGender::all(),
            'ref_ptk'   => RefPtk::all()
        ];
        return view('backend.teacher.index', compact('data', 'referensi'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validasi_data($request);

        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'] ? Hash::make($validatedData['password']) : Hash::make('aplikasi_raport2024');
            $user->save();
            $user->assignRole('Guru');

            $ref_guru = new RefGuru();
            $ref_guru->user_id  = $user->id;
            $ref_guru->nik  = $validatedData['nik'];
            $ref_guru->gelar_depan  = $validatedData['gelar_depan'];
            $ref_guru->gelar_belakang  = $validatedData['gelar_belakang'];
            $ref_guru->id_ptk  = $validatedData['id_ptk'];
            $ref_guru->save();
            DB::commit();

            $request->session()->flash('message', 'Berhasil menambah guru');
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }

    public function reset_password($id, Request $request)
    {
        $user = User::findOrFail($id);
        try {
            if ($user->hasRole('Guru')) {
                $reset_pass = Hash::make('aplikasi_raport2024');
                $user->password = $reset_pass;
                $user->save();

                $request->session()->flash('message', "Berhasil reset password");
                $request->session()->flash('alert-type', 'success');
            } else {
                $request->session()->flash('message', "Data guru tidak ditemukan");
                $request->session()->flash('alert-type', 'error');
            }
        } catch (\Exception $e) {
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }

    public function destroy($id, Request $request)
    {
        $ref_guru = RefGuru::findOrFail($id);
        try {
            $ref_guru->delete();

            $request->session()->flash('message', "Berhasil menghapus data");
            $request->session()->flash('alert-type', 'success');
        } catch (\Exception $e) {
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }
}
