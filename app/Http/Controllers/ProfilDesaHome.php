<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class ProfilDesaHome extends Controller
{
    //
    public function index()
    {
        //
        $struktur = Struktur::all();
        return view('home.profildesa.strukturorganisasi', compact('struktur'));
    }
}