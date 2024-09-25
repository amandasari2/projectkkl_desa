@extends('home.layout.app')
@section('content')
    <main class="main">

        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Galeri Kegiatan</h1>
            </div>
            <nav class="breadcrumbs">
                <!-- End Page Title -->

                <!-- Page Title -->
                <section id="gallery" class="gallery section">
                    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100"
                        style="max-width: 1000px; margin: 0 auto;">
                        <div class="row gy-4 justify-content-center">
                            @foreach ($gallery as $g)
                                <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div class="gallery-item h-100">
                                        <img src="{{ url('admin/image') }}/{{ $g->foto }}" alt=""
                                            class="img-fluid" style="width: 100%; height: 230px; object-fit: cover;">
                                        <!-- Atur ukuran gambar -->
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

                </section>

                <!-- /Gallery Section -->

    </main>
@endsection
