<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;
use App\Models\Gallery;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    //
    public function index(){

    $berita = Berita::take(3)->get();

    // $berita = Berita::select('judul','deskripsi','gambar','tanggal')->get();

    // $pengumuman = Pengumuman::pluck('title');
    $pengumuman = Pengumuman::take(3)->get();

    $struktur = Struktur::take(10)->get();
    // $struktur = Struktur::select('nama','jabatan','foto_pd')->get();

    $gallery = Gallery::take(8)->get();
    // $gallery = Gallery::select('title','keterangan','foto')->get();
    return view('home.home', compact('struktur','berita','pengumuman','gallery'));
    }

    public function berita($id){

        $berita = Berita::find($id);
        return view('home.home', compact('berita'));
    }

    public function pengumuman($id){

        $pengumuman = Pengumuman::find($id);
        return view('home.home', compact('pengumuman'));
    }
}