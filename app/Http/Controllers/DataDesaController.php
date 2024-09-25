<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDesa;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class DataDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datadesa = DataDesa::all();
        return view('admin.datadesa.index', compact('datadesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datadesa = DB::table('data_desa')->get();
        return view('admin.datadesa.create', compact('datadesa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_data' => 'required|in:Kependudukan,Pendidikan,Pertanian,Kesehatan,Ekonomi,Perternakan',
            'file' => 'required|mimes:pdf,xls,xlsx|max:2048',
            'tgl_update' => 'required|string|max:255',
        ], [
            'judul.required' => 'Judul wajib diisi!',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',

            'jenis_data.required' => 'Jenis data wajib diisi!',
            'jenis_data.in' => 'Jenis data tidak valid.',

            'file.required' => 'File wajib diupload!',
            'file.mimes' => 'File hanya boleh berupa file dengan ekstensi pdf, xls, atau xlsx.',
            'file.max' => 'Ukuran file maksimal 2 MB.',

            'tgl_update.required' => 'Tanggal update wajib diisi!',
            'tgl_update.string' => 'Tanggal update harus berupa teks.',
            'tgl_update.max' => 'Tanggal update tidak boleh lebih dari 255 karakter.',
        ]);

        $datadesa = new DataDesa;
        $datadesa->id = $request->id;
        $datadesa->judul = $request->judul;
        $datadesa->jenis_data = $request->jenis_data;
        if ($request->hasFile('file')) {
            // Validasi bahwa file harus berupa PDF atau Excel
            $request->validate([
                'file' => 'required|mimes:pdf,xls,xlsx|max:2048',
            ]);

            // Simpan file di dalam folder 'public/admin' dan dapatkan path-nya
            $fileName = $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->move(public_path('admin/files/'), $fileName);

            // Simpan nama file ke dalam database
            $datadesa->file = 'admin/files/' . $fileName;
        }
        $datadesa->tgl_update = $request->tgl_update;

        $datadesa->save();
        return redirect('/datadesa')->with('success', 'Data Desa Berhasil Di Tambahkan!');
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
        $datadesa = DataDesa::find($id);

        return view('admin.datadesa.edit', compact('datadesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil catatan DataDesa yang ada berdasarkan ID
        $datadesa = DataDesa::find($id);


        // Perbarui field judul dan tgl_update
        $datadesa->judul = $request->input('judul');
        $datadesa->jenis_data = $request->input('jenis_data');
        $datadesa->tgl_update = $request->input('tgl_update');

        if ($request->hasFile('file')) {
            // Validasi bahwa file harus berupa PDF atau Excel
            $request->validate([
                'file' => 'required|mimes:pdf,xls,xlsx|max:2048',
            ]);

            // Hapus file lama jika ada
            if ($datadesa->file && file_exists(public_path($datadesa->file))) {
                unlink(public_path($datadesa->file));
            }

            // Simpan file baru di dalam folder 'public/admin' dan dapatkan path-nya
            $fileName = $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->move(public_path('admin/files/'), $fileName);

            // Perbarui nama file di database
            $datadesa->file = 'admin/files/' . $fileName;
        }

        // Simpan catatan yang diperbarui
        $datadesa->save();

        // Redirect dengan pesan sukses
        return redirect('/datadesa')->with('success', 'Data Desa Berhasil Diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $datadesa = DataDesa::find($id);
        $datadesa->delete();

        return redirect('/datadesa')->with('success', 'Data Desa Berhasil Di Hapus!');
    }
}