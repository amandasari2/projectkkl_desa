<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDesa;
use App\Models\Gallery;
use App\Models\Struktur;
use App\Models\Berita;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah entri di masing-masing tabel
        $jumlahDataPerangkatDesa = Struktur::count();
        $jumlahDataGaleri = Gallery::count();
        $jumlahDataDesa = DataDesa::count();
        $jumlahDataBerita = Berita::count();
        $jumlahDataPengumuman = Pengumuman::count();

        // Kirim data ke tampilan
        return view('admin.dashboard', [
            'jumlahPerangkatDesa' => $jumlahDataPerangkatDesa,
            'jumlahGaleri' => $jumlahDataGaleri,
            'jumlahDataDesa' => $jumlahDataDesa,
            'jumlahDataBerita' => $jumlahDataBerita,
            'jumlahDataPengumuman' => $jumlahDataPengumuman,
        ]);
    }
}