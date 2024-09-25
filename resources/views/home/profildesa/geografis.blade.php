@extends('home.layout.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background position-relative">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Geografis Desa</h1>
            </div>
            <nav class="breadcrumbs">

            </nav>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39836.323667761935!2d99.65242265783698!3d2.823486444994136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303245e5f2e44ef3%3A0xc53a6e97a8279fa4!2sKantor%20Desa%20Teluk%20Dalam!5e0!3m2!1sid!2sid!4v1724141792433!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 370px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-12 content">
                    <h3>Geografis Desa Teluk Dalam</h3><br>
                    <p class="fst-italic">
                        Desa Teluk Dalam adalah salah satu Desa di antara 6 (Enam) Desa di wilayah Kecamatan Telukg Dalam
                        berada diatas ketinggian dari permukaan laut 21 DPL. Dengan memiliki luas Wilayah ± 3204.82 Ha.
                        Desa Teluk Dalam memiliki letak geografi sebagai berikut :


                    </p>
                    <ol>
                        <li class="mb-3">Sebelah Utara, berbatasan dengan Desa Perkebunan Teluk Dalam.</li>
                        <li class="mb-3">Sebelah Timur, berbatasan dengan Desa Anjung Ganjang.</li>
                        <li class="mb-3">Sebelah Selatan, berbatasan dengan Desa Mekar Tanjung dan Desa Pulau Maria.</li>
                        <li class="mb-3">Sebelah barat, berbatasan dengan Desa Pulau Tanjung Dan Mekar Tanjung.</li>

                    </ol><br>
                    <div class="container mt-5">
                        <h4 class="mb-4">Data Luas Dusun Desa Teluk Dalam</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col" class="col-no">No</th>
                                    <th scope="col" class="text-center">Dusun</th>
                                    <th scope="col" class="text-center">Luas Wilayah</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Data akan diisi di sini oleh JavaScript -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-center">Total</th>
                                    <th id="total-luas" class="text-center">3.204,82 Ha</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <script>
                        // Data array untuk pengulangan
                        const data = [{
                                dusun: 'Dusun 1',
                                luas: '468,91 Ha'
                            },
                            {
                                dusun: 'Dusun 2',
                                luas: '204,32 Ha'
                            },
                            {
                                dusun: 'Dusun 3',
                                luas: '261,60 Ha'
                            },
                            {
                                dusun: 'Dusun 4',
                                luas: '79,14 Ha'
                            },
                            {
                                dusun: 'Dusun 5',
                                luas: '79,14 Ha'
                            },
                            {
                                dusun: 'Dusun 6',
                                luas: '518,5633 Ha'
                            },
                            {
                                dusun: 'Dusun 7',
                                luas: '1018,782 Ha'
                            },
                            {
                                dusun: 'Dusun 8',
                                luas: '279,22 Ha'
                            },
                            // Tambahkan data lainnya di sini
                        ];


                        // Referensi ke elemen tbody
                        const tbody = document.getElementById('table-body');
                        // Looping melalui data array dan menambahkan baris ke tabel
                        data.forEach((item, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
            <th scope="row" class="text-center">${index + 1}</th>
            <td class="text-center">${item.dusun}</td>
            <td class="text-center">${item.luas}</td>
        `;
                            tbody.appendChild(tr);
                        });
                    </script>

                </div>

            </div>
        @endsection
