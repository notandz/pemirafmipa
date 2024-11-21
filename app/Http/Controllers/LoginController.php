<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|exists:users,nim',
        ]);

        // Ambil data pengguna berdasarkan NIM
        $user = User::with(['pilihanBem', 'pilihanHima'])->where('nim', $request->nim)->first();

        // Simpan data user ke session
        session(['user' => $user]);

        return redirect()->route('dashboard');
    }
}
