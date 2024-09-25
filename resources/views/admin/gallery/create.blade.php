@extends('admin.layouts.app')
@section('konten')
    <br>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Tambah Gambar Kegiatan</h1>
    <hr>

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-4 col-form-label">Judul Kegiatan</label>
            <div class="col-8">
                <input id="title" name="title" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-4 col-form-label">Keterangan Kegiatan</label>
            <div class="col-8">
                <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-4 col-form-label">Foto Kegiatan</label>
            <div class="col-8">
                <input id="foto" name="foto" type="file" class="form-control" accept=".png, .jpg, .jpeg, .svg">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
