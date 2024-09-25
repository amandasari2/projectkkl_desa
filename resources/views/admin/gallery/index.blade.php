@extends('admin.layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Gambar Kegiatan</h4>
                            <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Gambar Kegiatan
                                </button></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 200px;">Judul Kegiatan</th>
                                        <th>Keterangan Kegiatan</th>
                                        <th>Foto Kegiatan</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Keterangan Kegiatan</th>
                                        <th>Foto Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($gallery as $g)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $g->title }}</td>
                                            <td>{{ $g->keterangan }}</td>
                                            <td>
                                                @if ($g->foto)
                                                    <img src="{{ url('admin/image') }}/{{ $g->foto }}" width="100">
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('berita.show', $b->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a> --}}
                                                <a href="{{ route('gallery.edit', $g->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="far fa-edit"></a></i>
                                                {{-- Ini AWAL MODAL HAPUS --}}
                                                <!-- Button trigger modal -->
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#addRowModal{{ $g->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="addRowModal{{ $g->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                    Berita
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form action="{{ route('gallery.destroy', $g->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endsection
