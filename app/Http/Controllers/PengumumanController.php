<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengumuman = Pengumuman::all();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pengumuman = DB::table('pengumuman')->get();
        return view('admin.pengumuman.create', compact('pengumuman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ], [
            'title.required' => 'Title wajib diisi!',
            'title.string' => 'Title harus berupa teks.',
            'title.max' => 'Title tidak boleh lebih dari 255 karakter.',

            'tanggal.required' => 'Tanggal Wajib Diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',

            'deskripsi.required' => 'Deskripsi wajib diisi!',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'gambar.required' => 'Gambar wajib diupload!',
            'gambar.mimes' => 'Gambar hanya boleh berupa file dengan ekstensi jpg, jpeg, svg, atau png.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        if (!empty($request->gambar)) {
            // maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->gambar->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->gambar->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        $pengumuman = new Pengumuman;
        $pengumuman->id = $request->id;
        $pengumuman->title = $request->title;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->gambar = $fileName;

        $pengumuman->save();
        return redirect('/pengumuman')->with('success', 'Data Pengumuman Desa Berhasil Di Tambahkan!');

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
        $pengumuman = Pengumuman::find($id);

        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //foto lama
        $fotoLama = Pengumuman::select('gambar')->where('id', $id)->get();
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

        $pengumuman = Pengumuman::find($id);
        $pengumuman->title = $request->title;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->gambar = $fileName;
        $pengumuman->save();
        return redirect('/pengumuman')->with('success', 'Data Pengumuman Desa Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect('/pengumuman')->with('success', 'Data Pengumuman Desa Berhasil Di Hapus!');
    }
}