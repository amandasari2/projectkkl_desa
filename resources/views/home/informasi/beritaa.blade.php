@extends('home.layout.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Berita</h1>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            <div class="container">
                <div class="row gy-4">
                    @foreach ($berita as $b)
                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ url('admin/image') }}/{{ $b->gambar }}" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">{{ $b->judul }}</a>
                                </h2>
                                <p class="card-text" id="text">
                                    {{ Str::limit($b->deskripsi, 150) }}<a
                                        href="{{ url('detailberita/' . $b->id . '/' . Str::slug($b->judul)) }}"
                                        class="text-primary">Baca
                                        Selengkapnya</a>
                                </p>


                                <div class="d-flex align-items-center">
                                    <p class="post-date">
                                        <time
                                            datetime="2022-01-01">{{ \Carbon\Carbon::parse($b->tanggal)->format('M d, Y') }}</time>
                                    </p>
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    @endforeach

                </div>
            </div>

        </section><!-- /Blog Posts Section -->
        <!-- Blog Pagination Section -->
        <section id="blog-pagination" class="blog-pagination section">

            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>

        </section><!-- /Blog Pagination Section -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const paginationContainer = document.querySelector('#blog-pagination ul');

                paginationContainer.addEventListener('wheel', function(e) {
                    if (e.deltaY !== 0) {
                        e.preventDefault();
                        paginationContainer.scrollLeft += e.deltaY;
                    }
                });
            });
        </script>

    </main>
@endsection
