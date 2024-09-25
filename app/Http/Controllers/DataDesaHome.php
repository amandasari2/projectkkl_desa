<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDesa;

class DataDesaHome extends Controller
{
    //
    public function index()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Pendidikan')->get();
        return view('home.dataDesa.pendidikan', compact('datadesa'));
    }

    public function Kependudukan()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Kependudukan')->get();
        return view('home.dataDesa.kependudukan', compact('datadesa'));
    }

    public function Ekonomi()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Ekonomi')->get();
        return view('home.dataDesa.ekonomi', compact('datadesa'));
    }

    public function Kesehatan()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Kesehatan')->get();
        return view('home.dataDesa.kesehatan', compact('datadesa'));
    }

    public function Pertanian()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Pertanian')->get();
        return view('home.dataDesa.pertanian', compact('datadesa'));
    }

    public function Perternakan()
    {
        //
        $datadesa = DataDesa::where('jenis_data', 'Perternakan')->get();
        return view('home.dataDesa.perternakan', compact('datadesa'));
    }
}