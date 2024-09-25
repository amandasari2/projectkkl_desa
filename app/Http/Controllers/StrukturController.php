<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $struktur = Struktur::all();
        return view('admin.struktur.index', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $struktur = DB::table('struktur')->get();
        return view('admin.struktur.create', compact('struktur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'foto_pd' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            // 'deskripsi' => 'required',
        ], [
            // 'deskripsi.required' => 'Deskripsi Struktur Perangkat Desa Wajib Diisi',
            'foto_pd.exists' => 'Foto Galeri tidak valid.',
            'foto_pd.mimes' => 'Foto hanya boleh berupa file dengan ekstensi jpg, jpeg,svg atau png.',
            'foto_pd.max' => 'Ukuran foto maksimal 2 MB.',
            'jabatan.required' => 'Jabatan wajib diisi!',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'nama.required' => 'Nama wajib diisi!',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        ]);

        if (!empty($request->foto_pd)) {
            // maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->foto_pd->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto_pd->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        $struktur = new Struktur;
        $struktur->id = $request->id;
        $struktur->nama = $request->nama;
        $struktur->jabatan = $request->jabatan;
        // $struktur->deskripsi = $request->deskripsi;
        $struktur->foto_pd = $fileName;

        $struktur->save();
        return redirect('/struktur')->with('success', 'Data Struktur Perangkat Desa Berhasil Di Tambahkan!');
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
        $struktur = Struktur::find($id);

        return view('admin.struktur.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //foto lama
        $fotoLama = Struktur::select('foto_pd')->where('id', $id)->get();
        foreach ($fotoLama as $f1) {
            $fotoLama = $f1->foto_pd;
        }
        //jika foto sudah ada yang terupload
        if (!empty($request->foto_pd)) {
            //maka proses selanjutnya
            if (!empty($fotoLama->foto_pd)) unlink(public_path('admin/image' . $fotoLama->foto_pd));
            //proses ganti foto
            $fileName = 'foto-' . uniqid() . '.' . $request->foto_pd->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto_pd->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $fotoLama;
        }

        $struktur = Struktur::find($id);
        $struktur->nama = $request->nama;
        $struktur->jabatan = $request->jabatan;
        // $struktur->deskripsi = $request->deskripsi;
        $struktur->foto_pd = $fileName;
        $struktur->save();
        return redirect('/struktur')->with('success', 'Data Struktur Perangkat Desa Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $struktur = Struktur::find($id);
        $struktur->delete();

        return redirect('/struktur')->with('success', 'Data Struktur Perangkat Desa Berhasil Di Hapus!');
    }
}