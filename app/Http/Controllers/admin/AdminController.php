<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $data = Cache::remember('beranda' , 1 , function (){
            // $suratMasukBulanIni = Surat::where('created_at',);
            $suratDiProses = Surat::where('is_selesai', 0)->count();
            $suratMasukBulanIni = Surat::whereMonth('created_at', date('m'))->count();
            $warga = Warga::count();
            return array(
                'warga' => $warga,
                'suratDiProses' => $suratDiProses,
                'suratMasukBulanIni' => $suratMasukBulanIni,
            );
        });

        return view('admin.beranda' , [
            'data' => $data,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
