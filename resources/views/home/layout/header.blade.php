<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Website Desa Teluk Dalam Kab. Asahan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('home/assets/img/logo1.gif') }}" rel="icon">
    <link href="{{ asset('home/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('home/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: MeFamily
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <div class="alamat bg-primary">
        <ul class="list-unstyled d-flex justify-content-between p-3  ">
            <li><i class="bi bi-facebook"></i> DesaTeluk Dalam | <i class="bi bi-envelope"></i>
                desa.telukdalam123@gmail.com</li>
            <li><i class="bi bi-browser-chrome"></i> Desa Teluk Dalam</li>
        </ul>
    </div>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('home/assets/img/logo1.gif') }}" alt="" class="logo1">


                <h1 class="sitename font-weight-bold fs-6"> Desa Teluk Dalam <p>Kecamatan Teluk Dalam <br>Kabupaten
                        Asahan</p>
                </h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}"
                            class="{{ Request::is('/') ? 'btn btn-primary active' : '' }}">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#"
                            class="{{ Request::is('sejarahdesa') || Request::is('strukturorganisasi') || Request::is('visimisi') || Request::is('geografis') ? 'btn btn-primary text-white' : '' }}"><span>Profil
                                Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('/strukturorganisasi') }}"
                                    class=" {{ Request::is('strukturorganisasi') ? 'active' : '' }}">Struktur
                                    Organisasi Desa</a></li>
                            <li><a href="{{ url('/visimisi') }}"
                                    class="{{ Request::is('visimisi') ? ' active' : '' }}">Visi dan Misi</a></li>
                            <li><a href="{{ url('/sejarahdesa') }}"
                                    class="{{ Request::is('sejarahdesa') ? ' active' : '' }}">Sejarah Desa</a></li>
                            <li><a href="{{ url('/geografis') }}"
                                    class=" {{ Request::is('geografis') ? ' active' : '' }}">Geografi Desa</a></li>
                        </ul>
                    </li>


                    <li class="dropdown"><a href="#"
                            class="{{ Request::is('beritaa') || Request::is('pengumumandesa') || Request::is('gambar') ? 'btn btn-primary text-white' : '' }}"><span>Informasi</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('/beritaa') }}"
                                    class=" {{ Request::is('beritaa') ? ' active' : '' }}">Berita</a></li>
                            <li><a href="{{ url('/pengumumandesa') }}"
                                    class=" {{ Request::is('pengumumandesa') ? ' active' : '' }}">Pengumuman</a></li>
                            <li><a href="{{ url('/gambar') }}"
                                    class=" {{ Request::is('gambar') ? ' active' : '' }}">Galeri</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"
                            class="{{ Request::is('layananktp') || Request::is('layanankk') || Request::is('layananaktalahir') || Request::is('layananaktanikah') || Request::is('layanansuratpindah') || Request::is('layanansuratkematian') || Request::is('layanansuratketeranganberusaha') || Request::is('layanansurattanah') || Request::is('layanansktm') || Request::is('layananskkb') ? 'btn btn-primary text-white' : '' }}"><span>Layanan</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('/layananktp') }}">Pengurusan KTP</a></li>
                            <li><a href="{{ url('/layanankk') }}">Pengurusan Kartu Keluarga</a></li>
                            <li><a href="{{ url('/layananaktalahir') }}">Pengurusan Akte Lahir</a></li>
                            <li><a href="{{ url('/layananaktanikah') }}">Pengurusan Akte Nikah</a></li>

                            <li class="dropdown"><a href="#"><span>Surat Keterangan Lainnya</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="{{ url('/layanansuratpindah') }}">Pengurusan Surat Pindah</a></li>
                                    <li><a href="{{ url('/layanansuratkematian') }}">Pengurusan Surat Kematian</a></li>
                                    <li><a href="{{ url('/layanansuratketeranganberusaha') }}">Pengurusan Surat
                                            Keterangan Berusaha</a></li>
                                    <li><a href="{{ url('/layanansurattanah') }}">Pengurusan Surat Tanah</a></li>
                                    <li><a href="{{ url('/layanansktm') }}">Pengurusan SKTM</a></li>
                                    <li><a href="{{ url('/layananskkb') }}">Pengurusan SKKB</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"
                            class="{{ Request::is('kependudukan') || Request::is('pendidikan') || Request::is('pertanian') || Request::is('perternakan') || Request::is('kesehatan') || Request::is('ekonomi') ? 'btn btn-primary text-white' : '' }}"><span>Data
                                Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ url('/kependudukan') }}"
                                    class=" {{ Request::is('kependudukan') ? ' active' : '' }}">Kependudukan</a></li>
                            <li><a href="{{ url('/pendidikan') }}"
                                    class=" {{ Request::is('pendidikan') ? ' active' : '' }}">Pendidikan</a></li>
                            <li><a href="{{ url('/pertanian') }}"
                                    class=" {{ Request::is('pertanian') ? ' active' : '' }}">Pertanian</a></li>
                            <li><a href="{{ url('/perternakan') }}"
                                    class=" {{ Request::is('perternakan') ? ' active' : '' }}">Perternakan</a></li>
                            <li><a href="{{ url('/kesehatan') }}"
                                    class=" {{ Request::is('kesehatan') ? ' active' : '' }}">Kesehatan</a></li>
                            <li><a href="{{ url('/ekonomi') }}"
                                    class=" {{ Request::is('ekonomi') ? ' active' : '' }}">Ekonomi</a></li>
                        </ul>
                    </li>

                    
                        <li>
                            @guest
                                @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    
                    </li>

                </ul>
                </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
