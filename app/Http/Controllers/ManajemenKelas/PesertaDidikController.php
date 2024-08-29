<?php

namespace App\Http\Controllers\ManajemenKelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaDidikController extends Controller
{
    public function index()
    {
        return view('backend.peserta_didik.index');
    }
}
