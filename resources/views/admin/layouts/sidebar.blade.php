<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>{{ Auth::user()->role }} | Website Desa Teluk Dalam</title>
    <link href="{{ asset('admin/assets/img/kaiadmin/logoa.gif') }}" rel="icon">

    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />


    <link rel="apple-touch-icon" href="{{ asset('admin/assets/img/kaiadmin/logoa.gif') }}">

    <!-- Fonts and icons -->
    <script src="{{ asset('admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('admin/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('admin/assets/img/kaiadmin/logoa.gif') }}" alt="navbar brand"
                            class="navbar-brand" height="50" />
                        <span style=" color: #fff;">Desa Teluk Dalam</span>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar" aria-label="Toggle Sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler" aria-label="Toggle Side Navigation">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more" aria-label="More Options">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>

                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="nav-link" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>

                            </a>

                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item {{ Request::is('berita*') ? 'active' : '' }}">
                                <a href="{{ url('berita') }}">
                                    <i class="fas fa-desktop"></i>
                                    <p>Berita</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('pengumuman*') ? 'active' : '' }}">
                                <a href="{{ url('pengumuman') }}">
                                    <i class="fas fa-bullhorn"></i>
                                    <p>Pengumuman Desa</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('gallery*') ? 'active' : '' }}">
                                <a href="{{ url('gallery') }}">
                                    <i class="fas fa-image"></i>
                                    <p>Galeri Kegiatan</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('struktur*') ? 'active' : '' }}">
                                <a href="{{ url('struktur') }}">
                                    <i class="fas fa-people-carry"></i>
                                    <p>Struktur Organisasi</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'staff')
                            <li class="nav-item {{ Request::is('datadesa*') ? 'active' : '' }}">
                                <a href="{{ url('datadesa') }}">
                                    <i class="fas fa-database"></i>
                                    <p>Data Desa</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
