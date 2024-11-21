<?php

namespace App\Http\Controllers;

use App\Models\PilihanBem;
use App\Models\PilihanHima;
use Illuminate\Http\Request;

class PilihanController extends Controller
{
    // Menampilkan dashboard dengan pilihan BEM
    public function showDashboard()
    {
        $user = session('user'); // Ambil data user dari session
        $pilihan_bems = PilihanBem::all(); // Ambil data BEM
        return view('dashboard', compact('user', 'pilihan_bems'));
    }

    // Menangani pilihan BEM
    public function updatePilihanBem(Request $request)
    {
        $user = session('user'); // Ambil data user dari session

        // Validasi input
        $request->validate([
            'pilihan_bem' => 'required|exists:pilihan_bems,id',
        ]);

        // Update pilihan BEM
        $user->update([
            'pilihan_bem_id' => $request->pilihan_bem,
        ]);

        // Simpan data user yang sudah diperbarui kembali ke session
        session(['user' => $user]);

        // Arahkan ke halaman untuk memilih HIMA
        return redirect()->route('pilihHima');
    }

    // Menampilkan halaman untuk memilih HIMA setelah memilih BEM
    public function showPilihHima()
    {
        $user = session('user'); // Ambil data user dari session
        
        // Ambil HIMA yang sesuai dengan prodi pengguna (misalnya, Informatika)
        $pilihan_himas = PilihanHima::where('prodi', $user->prodi)->get(); // Menyaring HIMA berdasarkan prodi

        return view('pilih_hima', compact('user', 'pilihan_himas'));
    }

    // Menangani pilihan HIMA
    public function updatePilihanHima(Request $request)
    {
        $user = session('user'); // Ambil data user dari session

        // Validasi input
        $request->validate([
            'pilihan_hima' => 'required|exists:pilihan_himas,id',
        ]);

        // Update pilihan HIMA
        $user->update([
            'pilihan_hima_id' => $request->pilihan_hima,
        ]);

        // Simpan data user yang sudah diperbarui kembali ke session
        session(['user' => $user]);

        return redirect()->route('login')->with('success', 'Pilihan berhasil diperbarui');
    }
}
