<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Berita;
use App\Models\Pengumuman;

class InformasiHome extends Controller
{
    //
    public function index()
    {
        $berita = Berita::all();
        return view('home.informasi.beritaa', compact('berita'));
    }

    public function Pengumuman()
    {
        $pengumuman = Pengumuman::all();
        return view('home.informasi.pengumumandesa', compact('pengumuman'));
    }

    public function Galeri()
    {
        $gallery = Gallery::all();
        return view('home.informasi.gambar', compact('gallery'));
    }

    public function DetailBerita($id)
    {
        $berita = Berita::find($id);
        return view('home.informasi.detailberita', compact('berita'));
    }

    public function DetailPengumuman($id){
        $pengumuman = Pengumuman::find($id);
        return view('home.informasi.detailpengumuman', compact('pengumuman'));
    }
}
