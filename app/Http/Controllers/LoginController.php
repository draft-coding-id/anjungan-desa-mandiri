<?php

namespace App\Http\Controllers;

use App\Jobs\ScanKtp;
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\Facades\OcrSpace;
use App\Models\Warga;
use Codesmiths\LaravelOcrSpace\Enums\Language;
use Codesmiths\LaravelOcrSpace\Enums\OcrSpaceEngine;
use Codesmiths\LaravelOcrSpace\ValueObjects\OcrSpaceResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function showLoginPage(){
        if(Auth::user()){
            return redirect()->route('admin-beranda');
        }
        return view('admin.login');
    }

    // Admin Login
    public function cekAdminLogin(Request $request)
    {
        
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
            return redirect()->route('dashboard');
        }
        return view('warga.layanan-mandiri.login.nik');
    }

    public function scanKtp(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'ktp' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ], [
                'required' => 'Foto KTP tidak boleh kosong',
                'image' => 'Foto KTP harus berupa gambar',
                'mimes' => 'Foto KTP harus berformat jpeg, jpg, atau png',
                'max' => 'Foto KTP tidak boleh lebih dari 1MB',
            ]);
            $file = $request->file('ktp');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('ktp', $filename, 'public');
            $imageUrl = storage_path('app/public/' . $filePath);
            $options = OcrSpaceOptions::make()
                ->language(Language::English)
                ->OCREngine(OcrSpaceEngine::Engine2);
            $result = OcrSpace::parseImageFile($imageUrl, $options);
            $getParsedText = $result->getParsedResults()->first()->getParsedText();
            $lines = explode("\n", $getParsedText);
            $getNik = '';

            foreach ($lines as $line) {
                // ubah awalan nomor nik sesuai daerah
                if (strpos($line, '1') !== false) {
                    $getNik = $line;
                    break;
                }
            }
            $nik = str_replace(' ', '', $getNik);
            $nik = str_replace(':', '', $nik);
            $nik = substr($nik, 0, 16);
            $warga = Warga::where('nik', $nik)->first();
            if ($warga) {
                return redirect()->route('login.showPinForm', ['nik' => $nik]);
            }
            return redirect()->back()->withErrors(['ktp' => 'NIK tidak ditemukan']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['ktp' => $e->getMessage()]);
        }
    }

    // Mengecek NIK (Langkah 1)
    public function checkNik(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|min:16|exists:warga,nik',
            ], [
                'required' => 'NIK tidak boleh kosong',
                'min' => 'NIK harus 16 digit',
                'exists' => 'NIK tidak ditemukan',
            ]);
            // Jika NIK ditemukan, arahkan ke langkah 2
            $nik = $request->nik;
            return redirect()->route('login.showPinForm', ['nik' => $nik]);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('login-warga');
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
                return redirect()->route('dashboard');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'PIN salah');
            return redirect()->route('login-warga');
        }
    }

    // Halaman Dashboard
    public function showDashboard()
    {
        return view('warga.layanan-mandiri.layanan_umum');
    }

    public function logout(Request $request)
    {
        auth()->guard('warga')->logout();
        return redirect()->route('halaman_utama');
    }
}
