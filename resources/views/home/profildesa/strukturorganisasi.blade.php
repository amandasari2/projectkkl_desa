@extends('home.layout.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Struktur Organisasi Desa</h1>
        </div>
        <nav class="breadcrumbs">

        </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-12">
                <div class="col-lg-12">
                    <img src="{{ asset('home/assets/img/struktur.jpeg') }}" class="img-fluid" alt="">
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <section id="members" class="members section">


        <div class="container">

            <div class="row">
                @foreach ($struktur as $s)
                    <div class="col-lg-3 col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member" style="width: 100%; max-width: 300px;">

                            <img src="{{ url('admin/image') }}/{{ $s->foto_pd }}" class="img-fluid"
                                style="width: 100%; height: 400px; object-fit: cover;" alt="">

                            <div class="member-content" style="padding: 5px;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama </td>
                                            <td>:</td>
                                            <td>{{ $s->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan </td>
                                            <td>:</td>
                                            <td>{{ $s->jabatan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>

        </div>

    </section><!-- /Members Section -->
@endsection
