<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\skDomisili;
use Illuminate\Http\Request;

class LayananSurat extends Controller
{
    public function index()
    {
        skDomisili::all();
        dd(skDomisili::all());
    }
}