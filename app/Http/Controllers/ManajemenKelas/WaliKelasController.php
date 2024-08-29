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
}
