<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $berita = DB::table('berita')->get();
        return view('admin.berita.create', compact('berita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi request
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ], [
            'judul.required' => 'Judul Wajib Diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi Wajib Diisi.',
            'tanggal.required' => 'Tanggal Wajib Diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
            'gambar.required' => 'Gambar wajib diunggah.',
            'gambar.mimes' => 'Gambar hanya boleh berupa file dengan ekstensi jpg, jpeg, svg, atau png.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);


        //
        if (!empty($request->gambar)) {
            // maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->gambar->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->gambar->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        $berita = new Berita;
        $berita->id = $request->id;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->tanggal = $request->tanggal;
        $berita->gambar = $fileName;

        $berita->save();
        return redirect('/berita')->with('success', 'Data Berita Berhasil Di Tambahkan!');
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
        $berita = Berita::find($id);

        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //foto lama
        $fotoLama = Berita::select('gambar')->where('id', $id)->get();
        foreach ($fotoLama as $f1) {
            $fotoLama = $f1->gambar;
        }
        //jika foto sudah ada yang terupload
        if (!empty($request->gambar)) {
            //maka proses selanjutnya
            if (!empty($fotoLama->gambar)) unlink(public_path('admin/image' . $fotoLama->gambar));
            //proses ganti foto
            $fileName = 'foto-' . uniqid() . '.' . $request->gambar->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->gambar->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $fotoLama;
        }

        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->tanggal = $request->tanggal;
        $berita->gambar = $fileName;

        $berita->save();
        return redirect('/berita')->with('success', 'Data Berita Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $berita = Berita::find($id);
        $berita->delete();

        return redirect('/berita')->with('success', 'Data Berita Berhasil Dihapus');
    }
}