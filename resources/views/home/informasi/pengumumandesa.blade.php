@extends('home.layout.app')
@section('content')
    <section id="features" class="features section">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri: Berita -->
                <div class="">
                    <div class="berita">
                        <h5 class="border-bottom pb-3 mb-4 fw-bolder">Pengumuman</h5>
                    </div>
                    @foreach ($pengumuman as $p)
                        <div class="card mb-2">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center p-3">
                                    <img src="{{ url('admin/image') }}/{{ $p->gambar }}" class="img-fluid rounded-end"
                                        alt="Gambar Berita">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none">
                                            <h5 class="card-title">{{ $p->title }}</h5>
                                        </a>
                                        <p class="card-subtitle mb-2 text-muted">
                                            {{ \Carbon\Carbon::parse($p->tanggal)->format('M d, Y') }}</p>
                                        <p class="card-text" id="text">
                                            {{ Str::limit($p->deskripsi, 150) }}<a
                                                href="{{ url('detailpengumuman/' . $p->id . '/' . Str::slug($p->title)) }}"
                                                class="text-primary">Baca
                                                Selengkapnya</a>
                                        </p>


                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
