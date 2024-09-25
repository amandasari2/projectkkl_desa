@extends('home.layout.app')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Detail Pengumuman</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ url('admin/image') }}/{{ $pengumuman->gambar }}" alt="" class="img-fluid" width="100%" height="100%" align-items-center>
                            </div>

                            <h2 class="title">{{ $pengumuman->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('M d, Y') }}</time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <p>{!! nl2br(e($pengumuman->deskripsi)) !!}</p>

                            </div><!-- End post content -->

                        </article>


                    </div>
                </section><!-- /Blog Details Section -->

            </div>

        </div>
    </div>

</main>

@endsection
