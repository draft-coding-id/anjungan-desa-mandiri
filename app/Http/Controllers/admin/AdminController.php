<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

/**
 * AdminController
 */
class AdminController extends Controller
{
    /**
     * GetDataWarga
     *
     * @return void
     */
    public function getDataWarga()
    {
        $data_warga = Warga::paginate(10);
        return view('admin.data-warga', ['data_warga' => $data_warga]);
    }
}
