@extends('admin.layouts.app')
@section('konten')
    <br>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Tambah Data Desa</h1>
    <hr>

    <form action="{{ route('datadesa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="judul" class="col-4 col-form-label">Judul Data Desa</label>
            <div class="col-8">
                <input id="judul" name="judul" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_data" class="col-4 col-form-label">Jenis Data</label>
            <div class="col-8">
                <select id="jenis_data" name="jenis_data" class="custom-select">
                    <option value="">-- Pilih Jenis Data --</option>
                    <option value="Kependudukan">Kependudukan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Perternakan">Perternakan</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-4 col-form-label">File Data Desa</label>
            <div class="col-8">
                <input id="file" name="file" type="file" class="form-control" accept=".pdf, .xls, .xlsx">
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_update" class="col-4 col-form-label">Tanggal Update</label>
            <div class="col-8">
                <input id="tgl_update" name="tgl_update" type="date" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
