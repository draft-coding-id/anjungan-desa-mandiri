<?php

namespace App\Http\Controllers\admin;

use Exception;

use App\Models\User;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles->pluck('name')->first(); // Ambil role pertama

        $suratDiProses = Surat::where('is_selesai', 0)->count();

        $suratMasukBulanIni = Surat::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $wargaQuery = Warga::query();

        // Default populasi warga
        $warga = 0;

        if (in_array($role, ['admin', 'kades'])) {
            // Admin & Kades lihat semua warga
            $warga = $wargaQuery->count();
        } elseif ($role === 'rw') {
            // RW: akses bisa "RW 1"
            if (preg_match('/RW\s*(\d+)/i', $user->akses, $matches)) {
                $rw = $matches[1];
                $warga = $wargaQuery->where('rw', $rw)->count();
            }
        } elseif ($role === 'rt') {
            // RT: akses bisa "RT 2 - RW 1"
            if (preg_match('/RT\s*(\d+)\s*-\s*RW\s*(\d+)/i', $user->akses, $matches)) {
                $rt = $matches[1];
                $rw = $matches[2];
                $warga = $wargaQuery->where('rt', $rt)->where('rw', $rw)->count();

            }
        }
        $dalamProses = Surat::DalamProses()->orderBy('created_at' , 'desc')->take(5)->get();
        $belumDikirimKeWarga = Surat::BelumDikirimkanKeWarga()->orderBy('created_at', 'desc')->take(5)->get();
        $increment = 1;
        $incrementForTableBelumDiserahkan = 1;

        return view('admin.beranda', [
            'warga' => $warga,
            'suratDiProses' => $suratDiProses,
            'suratMasukBulanIni' => $suratMasukBulanIni,
            'dalamProses' => $dalamProses,
            'belumDikirimKeWarga' => $belumDikirimKeWarga,
            'increment' => $increment,
            'incrementForTableBelumDiserahkan' => $incrementForTableBelumDiserahkan,
        ]);
    }


    public function getUsers()
    {
        $admin = User::role('admin')->paginate(5);
        $kades = User::role('kades')->paginate(5);
        $rt = User::role('rt')->paginate(5);
        $rw = User::role('rw')->paginate(5);
        return view('admin.pengaturan-akses', [
            'admin' => $admin,
            'kades' => $kades,
            'rt' => $rt,
            'rw' => $rw,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tambahAkun(Request $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'akses' => $request->akses,
                'no_hp' => $request->no_hp,
            ]);
            $user->assignRole($request->role);
            Cache::forget('beranda');
            return redirect()->route('pengaturan-akses');
        } catch (Exception $error) {
            return redirect()->back()->withErrors($error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function showAkun(string $id)
    {
        $user = User::findOrFail($id);
        // Bagaimana mendapatkan role user ? 
        $userRole = $user->getRoleNames()->first();
        return response()->json([
            'user' => $user,
            'roles' => $userRole,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAkun(Request $request)
    {
        $user = User::findOrFail($request->id);

        try {
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'akses' => $request->akses,
                'password' => $request->password
                    ? Hash::make($request->password)
                    : $user->password, // kalau kosong, jangan ganti
            ]);

            // Ganti role lama dengan role baru
            $user->syncRoles([$request->role]);

            Cache::forget('beranda');
            return redirect()->route('pengaturan-akses');
        } catch (Exception $error) {
            return redirect()->back()->withErrors($error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
