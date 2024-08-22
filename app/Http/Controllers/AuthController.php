<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('/');
        } catch (ValidationException) {
            $desc = 'Gagal Login. Cek Email dan password Anda.';
            return back()->with('message', ['status' => 'danger', 'desc' => $desc]);
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
