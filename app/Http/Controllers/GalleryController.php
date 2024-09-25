<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $gallery = DB::table('galery')->get();
        return view('admin.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
            'title' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'foto.exists' => 'Foto Galeri tidak valid.',
            'foto.mimes' => 'Foto hanya boleh berupa file dengan ekstensi jpg, jpeg,svg atau png.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'title.required' => 'Judul wajib diisi!',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi!',
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.',
        ]);

        if (!empty($request->foto)) {
            // maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        $gallery = new Gallery;
        $gallery->id = $request->id;
        $gallery->title = $request->title;
        $gallery->keterangan = $request->keterangan;
        $gallery->foto = $fileName;

        $gallery->save();
        return redirect('/gallery')->with('success', 'Data Gambar Berita Berhasil Di Tambahkan!');
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
        $gallery = Gallery::find($id);

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //foto lama
        $fotoLama = Gallery::select('foto')->where('id', $id)->get();
        foreach ($fotoLama as $f1) {
            $fotoLama = $f1->foto;
        }
        //jika foto sudah ada yang terupload
        if (!empty($request->foto)) {
            //maka proses selanjutnya
            if (!empty($fotoLama->foto)) unlink(public_path('admin/image' . $fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $fotoLama;
        }

        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->keterangan = $request->keterangan;
        $gallery->foto = $fileName;

        $gallery->save();
        return redirect('/gallery')->with('success', 'Data Foto Berita Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect('/gallery')->with('success', 'Data Gambar Berita Berhasil Di Hapus!');
    }
}