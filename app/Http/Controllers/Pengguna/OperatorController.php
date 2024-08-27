<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $data = User::role('Operator')->with('ref_guru')->get();
        $userIds = User::role('Guru')->pluck('id');
        $data_guru = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Guru'); // Pastikan nama role 'Guru' diperiksa dengan benar
            })
            ->with('ref_guru')
            ->get();

        $referensi = [
            'ref_gender' => RefGender::all(),
            'ref_ptk'   => RefPtk::all()
        ];

        return view('backend.operator.index', compact('data', 'data_guru', 'referensi'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        try {
            if ($user->hasRole('Guru')) {
                $user->assignRole('Operator');
                flash()->success('Berhasil menambahkan data');
            } else {
                flash()->error('User tidak memiliki role guru');
            }
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan. ' . $e->getMessage());
        }
        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            if ($user->hasRole('Operator')) {
                $user->removeRole('Operator');
                flash()->success('Role Operator berhasil dihapus');
            } else {
                flash()->error('Role Operator tidak ditemukan untuk pengguna ini');
            }
        } catch (\Exception $e) {
            flash()->error('Terjadi kesalahan. ' . $e->getMessage());
        }
        return back();
    }
}
