<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

/**
 * AuthController
 * @link
 */
class AuthController extends Controller
{
    // Tampilkan form login
    /**
     * ShowLoginForm
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Validasi NIK
    /**
     * ValidateNIK
     *
     * @param mixed $request
     */
    public function validateNIK(Request $request)
    {
        $request->validate(['nik' => 'required|digits:16|exists:warga,nik',]);

        session(['nik' => $request->nik]); // Simpan NIK ke dalam session
        return view('auth.pin'); // Redirect ke halaman PIN
    }


    /**
     * ValidatePIN
     *
     * @param  mixed $request
     * @return void
     */
    public function validatePIN(Request $request)
    {
        $request->validate(['pin' => 'required|digits:6',]);

        $nik = session('nik');
        $warga = Warga::where('nik', $nik)->first();

        if ($warga && $warga->pin === $request->pin) {
            session(['warga' => $warga]); // Simpan data warga ke session
            return redirect()->route('menu');
        }

        return back()->withErrors(['pin' => 'PIN salah.']);
    }

    /**
     * ShowMenu
     *
     * @return void
     */
    public function showMenu()
    {
        $warga = session('warga'); // Ambil data warga dari session

        if (!$warga) {
            return redirect()->route('login'); // Jika session tidak ada, redirect ke login
        }

        return view('menu', ['warga' => $warga]);
    }
}
