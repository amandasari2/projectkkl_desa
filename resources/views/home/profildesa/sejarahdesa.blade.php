@extends('home.layout.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Sejarah Desa</h1>
                <nav class="breadcrumbs">

                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <div class="post-img">
                                    <img src="{{ asset('home/assets/img/desa.jpeg') }}" alt="" class="img-fluid" style="width: 100%;">
                                </div>

                                <h2 class="title">Sejarah Desa Teluk Dalam</h2>

                                <div class="content">
                                    <p>
                                        Desa Teluk Dalam memiliki luas 5320 Ha (53,2 Km2) yang terdiri dari 8 Wilayah Bagian
                                        Pemerintah yang disebut Dusun. Desa Teluk Dalam masuk dalam wilayah Kecamatan Teluk
                                        Dalam Kabupaten Asahan setelah Pemekaran Kecamatan Simpang Empat menjadi dua
                                        kecamatan yakni Kecamatan Simpang Empat sebagai Kecamatan Induk dan Kecamatan Teluk
                                        Dalam sebagai Kecamatan Hasil Pemekaran.
                                    </p>

                                    <p>
                                        Salah satu Dusun dari 8 Dusun yang ada di Desa Teluk Dalam adalah HGU milik
                                        Perkebunan PT. PADASA ENAM UTAMA yang Natoben adalah perpindahan Hak dari PTP.N VI
                                        Billiton kepada PT. PADASA ENAM UTAMA yakni Dusun VII Desa Teluk Dalam yang dihuni
                                        oleh 94 Kepala Keluarga dan seluruhnya adalah Karyawan Perusahaan.
                                        Sekitar tahun 1980 Desa Teluk Dalam secara territorial direncanakan menjadi 9 Dusun
                                        yang dusun IX tersebut direncanakan sebagai Dusun Persiapan, namun tidak berlanjut
                                        dikarenakan Jumlah Penghuni wilayah tersebut tidak memenuhi kategori sebuah Dusun
                                        sehingga sampai saat ini belum bisa dijadikan sebagai Dusun Defenitif walaupun
                                        secara Administrasi sudah terbit Surat Keterangan Tanah yang berdomisili di Dusun
                                        IX.

                                    </p>

                                    <p>
                                        Desa Teluk Dalam adalah tergolong Desa baru yang terbentuk sekitar tahun 1900 dan
                                        berada dalam bantaran Sungai Asahan yang pada saat itu masih dipimpin oleh pengetua
                                        kampong, dan pada tahun 1951 Desa Teluk Dalam dipimpin olah Pemerintah Desa yang
                                        disebut Penghulu, barulah pada tahun 1961 Desa Teluk Dalam dipimpin oleh yang
                                        namanya Kepala Desa.
                                    </p>

                                    <p>
                                        Menurut Sejarah perkembang Desa, peristiwa-peristiwa penting yang terjadi sepanjang
                                        perkembangan di Desa Teluk Dalam tidaklah banyak tercatat dikarenakan minimnya
                                        kajian-kajian dan bukti sejarah, namun dapat diterangkan sebagai berikut:
                                    </p>

                                    <p>

                                    </p>



                                </div>

                            </article>

                            <div class="container mt-5">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col" class="col-no">No</th>
                                            <th scope="col" class="text-center">Tahun</th>
                                            <th scope="col" class="text-center">Pristiwa Baik</th>
                                            <th scope="col" class="text-center">Pristiwa Buruk</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        <!-- Data akan diisi di sini oleh JavaScript -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const data = [{
                                    tahun: 'Abad Ke XVII',
                                    pw: '',
                                    pb: 'Bangsa Indonesia dijajah Belanda termasuk Desa Teluk Dalam yang menerima imbas'
                                },
                                {
                                    tahun: '1910',
                                    pw: 'Kampung Teluk Dalam diketahui oleh Ketua Kampung MAUSIN MARGOLANG',
                                    pb: ''
                                },
                                {
                                    tahun: '1915',
                                    pw: 'Kampung Teluk Dalam diketui oleh Ketua Kampung BAKI (AYAH KONGAH)',
                                    pb: ''
                                },
                                {
                                    tahun: '1921',
                                    pw: 'Kampung Teluk Dalam Diketuai oleh Ketua Kampung DIMAN',
                                    pb: ''
                                },
                                {
                                    tahun: '1925',
                                    pw: 'Kampung Teluk Dalam Diketuai oleh Ketua Kampung KALANG',
                                    pb: ''
                                },
                                {
                                    tahun: '1931',
                                    pw: 'Kampung Teluk Dalam Diketuai oleh Ketua Kampung MAEL MARGOLANG',
                                    pb: ''
                                },
                                {
                                    tahun: '1936',
                                    pw: 'Ketua Kampung dirobah sebutannya menjadi Kepala Kampung dan di Kepalai oleh SUMAN MARGOLANG',
                                    pb: ''
                                },
                                {
                                    tahun: '1942',
                                    pw: 'Belanda diusir Jepang dari Indonesia (termasuk Desa Teluk Dalam)',
                                    pb: ''
                                },
                                {
                                    tahun: '1956',
                                    pw: 'M. IDHAM MARGOLANG sempat memerintah dengan sebutan Kepala Kampung dan kemudian berobah menjadi Kepala Desa',
                                    pb: ''
                                },
                                {
                                    tahun: '1988',
                                    pw: 'MUSTAMAR sebagai Kepala Desa Teluk Dalam dengan Masa Jabatan 8 Tahun',
                                    pb: ''
                                },
                                {
                                    tahun: '1996',
                                    pw: 'EDI KESUMA sebagai Kepala Desa Teluk Dalam dengan Masa Jabatan 8 Tahun',
                                    pb: ''
                                },
                                {
                                    tahun: '2004 s/d 2009',
                                    pw: 'SAMSUL LUBIS sebagai Kepala Desa Teluk Dalam dengan Masa Jabatan 5 Tahun',
                                    pb: ''
                                },
                                {
                                    tahun: '2016 s/d 2022',
                                    pw: 'JEMMY CARTER SITORUS Sebagai Kepala Desa teluk Dalam dengan Masa Jabatan 6 Tahun',
                                    pb: ''
                                },
                                {
                                    tahun: '2022 s/d 2028',
                                    pw: 'FAUZI NURFI LUBIS Sebagai Kepala Desa Teluk Dalam Dengan Masa Jabatan 6 Tahun',
                                    pb: ''
                                }
                            ];

                            const tbody = document.getElementById('table-body');

                            data.forEach((item, index) => {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                <th scope="row" class="text-center">${index + 1}</th>
                <td class="text-center">${item.tahun}</td>
                <td class="text-center">${item.pw}</td>
                <td class="text-center">${item.pb}</td>
            `;
                                tbody.appendChild(tr);
                            });
                        });
                    </script>
                @endsection
