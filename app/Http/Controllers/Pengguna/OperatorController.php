<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\RefGender;
use App\Models\RefPtk;
use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $userIds = User::role('Guru')->pluck('id');
        $data_guru = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Guru'); // Pastikan nama role 'Guru' diperiksa dengan benar
            })
            ->with('ref_guru')
            ->get();

        $data = User::role('Operator')->with('ref_guru.ref_ptk')->get();

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

                $request->session()->flash('message', 'Berhasil menyimpan data');
                $request->session()->flash('alert-type', 'success');
            } else {
                $request->session()->flash('message', 'User bukan role guru');
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
        $user = User::findOrFail($id);
        try {
            if ($user->hasRole('Operator')) {
                $user->removeRole('Operator');

                $request->session()->flash('message', 'Berhasil menghapus data');
                $request->session()->flash('alert-type', 'success');
            } else {
                $request->session()->flash('message', 'User tidak memiliki role operator');
                $request->session()->flash('alert-type', 'error');
            }
        } catch (\Exception $e) {
            $request->session()->flash('message', "Terjadi kesalahan. $e");
            $request->session()->flash('alert-type', 'error');
        }
        return back();
    }
}
