@extends('home.layout.app')
@section('content')
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
            /* Tambahkan efek zoom saat hover */
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* Background hitam transparan */
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
            /* Letakkan layer di atas gambar */
        }

        .gallery-item:hover::before {
            opacity: 1;
            /* Munculkan background hitam saat hover */
        }

        .gallery-links {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
            /* Letakkan link di atas background hitam */
        }

        .gallery-item:hover .gallery-links {
            opacity: 1;
        }

        .gallery-title {
            margin-top: 10px;
            text-align: center;
        }
    </style>
    <!-- Main Section -->
    <section id="features" class="features section">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri: Berita -->
                <div class="col-md-8">
                    <div class="berita">
                        <h5 class="border-bottom pb-3 mb-4 fw-bolder">
                            <a href="{{ url('beritaa') }}" class="text-decoration-none text-dark" id="toggleLink"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat lainnya">
                                Berita <span class="text-primary">Terkini</span> <i class="bi bi-chevron-right"></i>
                            </a>
                        </h5>
                    </div>
                    @foreach ($berita as $b)
                        <div class="card mb-4">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex align-items-center p-3 position-relative">
                                    <img src="{{ url('admin/image') }}/{{ $b->gambar }}"
                                        class="img-fluid rounded-end w-100" alt="Gambar Berita">
                                    <p
                                        class="date-overlay position-absolute bottom-0 start-0 bg-primary text-white p-2 m-3 rounded">
                                        {{ \Carbon\Carbon::parse($b->tanggal)->format('M d, Y') }}
                                    </p>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none">
                                            <h5 class="card-title">{{ $b->judul }}</h5>
                                        </a>
                                        <p class="card-text" id="text">
                                            {{ Str::limit($b->deskripsi, 150) }} <a href="{{ url('detailberita/' . $b->id . '/' . Str::slug($b->judul)) }}"
                                                class="text-primary">Baca
                                                Selengkapnya</a>
                                        </p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Kolom Kanan: Konten Lain -->
                <div class="col-md-4">
                    <div class="konten-lain">
                        <h5 class="border-bottom pb-3 mb-4 fw-bolder">
                            <a href="{{ url('pengumumandesa') }}" class="text-decoration-none text-dark" id="toggleLink"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat lainnya">
                                <span class="text-primary">Pengumuman</span> <i class="bi bi-chevron-right"></i>
                            </a>
                        </h5>
                        @foreach ($pengumuman as $p)
                            <div class="card mb-4 bg-primary text-white" style="width: 100%;">
                                <div class="card-body">
                                    <p class="card-text">{{ $p->title }}</p>
                                    <a href="{{ url('detailpengumuman/' . $p->id . '/' . Str::slug($p->title)) }}"
                                        class="text-white">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Features Section -->

    {{-- Gallery Section --}}
    <section id="galery">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="berita">
                        <h5 class="border-bottom pb-3 mb-4 fw-bolder">
                            <a href="{{ url('gambar') }}" class="text-decoration-none text-dark" id="toggleLink"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat lainnya">
                                Galeri <span class="text-primary">Kegiatan</span> <i class="bi bi-chevron-right"></i>
                            </a>
                        </h5>
                    </div>

                    <div>
                        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100"
                            style="max-width: 1000px; margin: 0 auto;">

                            <div class="row gy-4 justify-content-center">
                                @foreach ($gallery as $g)
                                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch">
                                        <div class="gallery-item h-100" style="width: 230px;"> <!-- Set lebar container -->
                                            <img src="{{ url('admin/image') }}/{{ $g->foto }}" alt=""
                                                class="img-fluid" style="width: 100%; height: 150px; object-fit: cover;">
                                            <!-- Atur proporsi gambar -->
                                            <div class="gallery-title text-center mt-2">
                                                <h6>{{ $g->title }}</h6>
                                            </div>
                                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                                <a href="{{ url('admin/image') }}/{{ $g->foto }}"
                                                    title="{{ $g->keterangan }}" class="glightbox preview-link"><i
                                                        class="bi bi-arrows-angle-expand"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- End Gallery Item -->
                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="konten-lain">
                        <h5 class="border-bottom pb-3 mb-4 fw-bolder">
                            <a href="{{ url('strukturorganisasi') }}" class="text-decoration-none text-dark"
                                id="toggleLink" data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat lainnya">
                                Struktur <span class="text-primary">Organisasi</span> <i class="bi bi-chevron-right"></i>
                            </a>
                        </h5>

                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="2000" style="max-width: 300px; max-height: 300px; margin: 0 auto;">
                            <div class="carousel-inner">
                                @foreach ($struktur as $index => $s)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ url('admin/image') }}/{{ $s->foto_pd }}" class="d-block w-100"
                                            alt="..." style="height: 300px;">
                                        <div class="carousel-caption">
                                            <div class="caption-content">
                                                <h5>{{ $s->nama }}</h5>
                                                <p>{{ $s->jabatan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    {{-- Map Section --}}

    <section id="map" class="map">
        <div class="container">
            <div class="berita">
                <h5 class="border-bottom pb-3 mb-4 fw-bolder">Informasi Desa</h5>
            </div>
            <div class="row">
                <div class="col-md-8">

                    <div class="card mb-4">
                        <div class="row g-0">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39836.323667761935!2d99.65242265783698!3d2.823486444994136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303245e5f2e44ef3%3A0xc53a6e97a8279fa4!2sKantor%20Desa%20Teluk%20Dalam!5e0!3m2!1sid!2sid!4v1724141792433!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Konten Lain -->
                <div class="col-md-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Desa</td>
                                <td>Teluk Dalam</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>Teluk Dalam</td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>Asahan</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>Sumatera Utara</td>
                            </tr>
                            <tr>

                                <td>Jumlah Penduduk</td>
                                <td>21.000 Orang</td>
                            </tr>

                            <tr>
                                <td>Luas</td>
                                <td>53.20 km</td>
                            </tr>
                            <tr>
                                <td>Koordinat</td>
                                <td>2.8292264632387005 LU, 99.69990657623674 BT </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
