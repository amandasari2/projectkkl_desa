@extends('admin.layouts.app')
@section('konten')
    <br>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Edit Struktur Perangkat Desa</h1>
    <hr>

    <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $struktur->nama }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-4 col-form-label">Jabatan</label>
            <div class="col-8">
                <input id="jabatan" name="jabatan" type="text" class="form-control" value="{{ $struktur->jabatan }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="foto_pd" class="col-4 col-form-label">Foto Struktur Perangkat Desa</label>
            <div class="col-8">
                <input id="foto_pd" name="foto_pd" type="file" class="form-control" accept=".png, .jpg, .jpeg, .svg" value="{{ $struktur->foto_pd }}">
                <br>
                @if (!empty($struktur->foto_pd))
                    <img src="{{ url('admin/image') }}/{{ $struktur->foto_pd }}" alt="" width="250px">
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
