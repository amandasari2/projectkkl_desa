@extends('admin.layouts.app')
@section('konten')
    <br>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Tambah Struktur Perangkat Desa</h1>
    <hr>

    <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-4 col-form-label">Jabatan</label>
            <div class="col-8">
                <input id="jabatan" name="jabatan" type="text" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="foto_pd" class="col-4 col-form-label">Foto Struktur Perangkat Desa</label>
            <div class="col-8">
                <input id="foto_pd" name="foto_pd" type="file" class="form-control" accept=".png, .jpg, .jpeg, .svg">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
