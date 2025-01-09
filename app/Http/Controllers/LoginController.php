<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Menampilkan form NIK (Langkah 1)
    public function showNikForm()
    {
        return view('warga.layanan-mandiri.login.nik');
    }

    // Mengecek NIK (Langkah 1)
    public function checkNik(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:warga,nik',
        ], [
            'nik.exists' => 'Data NIK tidak dikenali, silahkan hubungi pengurus desa.',
        ]);

        // Jika NIK ditemukan, arahkan ke langkah 2
        $nik = $request->nik;
        return redirect()->route('login.showPinForm', ['nik' => $nik]);
    }

    // Menampilkan form PIN (Langkah 2)
    public function showPinForm($nik)
    {
        return view('warga.layanan-mandiri.login.pin', ['nik' => $nik]);
    }

    // Mengecek PIN (Langkah 2)
    public function checkPin(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:warga,nik',
            'pin' => 'required',
        ]);

        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan.']);
        }

        // Hitung percobaan salah
        $attempts = Session::get('login_attempts', 0);

        if (!password_verify($request->pin, $warga->pin)) {
            $attempts++;
            Session::put('login_attempts', $attempts);

            // Jika 5 kali salah, blokir akses
            if ($attempts >= 5) {
                return back()->withErrors(['pin' => 'Anda telah memasukkan PIN yang salah sebanyak 5 kali. Akun Anda telah diblokir.']);
            }

            return back()->withErrors(['pin' => 'PIN yang Anda masukkan salah, silahkan coba lagi.']);
        }

        // Jika PIN benar, reset counter percobaan dan arahkan ke Halaman Utama
        Session::forget('login_attempts');
        session(['warga' => $warga]); // Simpan data warga ke session
        return redirect()->route('pilih-surat')->with('success', 'Login berhasil!');
    }
        
    // Halaman Menu
    public function showMenu()
    {
        $warga = session('warga'); // Ambil data warga dari session

        if (!$warga) {
            return redirect()->route('login'); // Jika session tidak ada, redirect ke login
        }

        return view('warga.layanan-mandiri.pilih-surat', ['warga' => $warga]);
    }
}
