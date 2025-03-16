<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Admin Login
    public function cekAdminLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin-beranda');
        }

        session()->flash('error', 'Username atau Password salah');
        return redirect('/admin');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('admin');
    }

    // Menampilkan form NIK (Langkah 1)
    public function showNikForm()
    {
        if (auth()->guard('warga')->check()) {
            return redirect()->route('pilih-surat');
        }
        return view('warga.layanan-mandiri.login.nik');
    }

    // Mengecek NIK (Langkah 1)
    public function checkNik(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|exists:warga,nik',
            ]);
            // Jika NIK ditemukan, arahkan ke langkah 2
            $nik = $request->nik;
            return redirect()->route('login.showPinForm', ['nik' => $nik]);
        } catch (\Exception $e) {
            session()->flash('error', 'NIK tidak ditemukan');
            return redirect()->route('login.warga');
        }
    }

    // Menampilkan form PIN (Langkah 2)
    public function showPinForm($nik)
    {
        return view('warga.layanan-mandiri.login.pin', ['nik' => $nik]);
    }

    // Mengecek PIN (Langkah 2)
    public function checkPin(Request $request)
    {
        $request['pin'] = $request['pin1'] . $request['pin2'] . $request['pin3'] . $request['pin4'] . $request['pin5'] . $request['pin6'];
        try {
            $request->validate([
                'nik' => 'required|exists:warga,nik',
                'pin' => 'required',
            ]);
            $credentials = $request->only('nik', 'pin');
            $warga = Warga::where('nik', $request->nik)->first();
            if (!$warga) {
                return back()->withErrors(['nik' => 'NIK tidak ditemukan.']);
            }

            if (!password_verify($request->pin, $warga->pin)) {
                session()->flash('error', 'PIN salah');
                return redirect()->route('login.showPinForm', ['nik' => $request->nik]);
            }
            $res = auth()->guard('warga')->attempt([
                'nik' => $credentials['nik'],
                'password' => $credentials['pin'],
            ]);
            if ($res) {
                return redirect()->route('pilih-surat');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'PIN salah');
            return redirect()->route('login.warga');
        }
    }

    // Halaman Menu
    public function showMenu()
    {
        return view('warga.layanan-mandiri.pilih-surat');
    }

    public function logout(Request $request)
    {
        auth()->guard('warga')->logout();
        return redirect()->route('login');
    }
}