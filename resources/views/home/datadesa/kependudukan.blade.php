@extends('home.layout.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Data Kependudukan</h1>
        </div>
    </div><!-- End Page Title -->

    <section class="table">
        <div class="container">
            <div class="table-responsive" style="max-width: 1000px; margin: 0 auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Jenis Data</th>
                            <th scope="col" style="width: 150px;">Tanggal Update</th>
                            <th scope="col" style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($datadesa as $dd)
                            @if ($dd->jenis_data === 'Kependudukan')
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $dd->judul }}</td>
                                    <td>{{ $dd->jenis_data }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dd->tgl_update)->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ asset($dd->file) }}" class="btn btn-primary" target="_blank">Lihat
                                            File</a>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
