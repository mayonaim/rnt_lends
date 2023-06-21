@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- R&T Lends -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('borrower.view_assets') }}" class="card border-left-success shadow h-100 py-2"
                    style="text-decoration: none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <h5>Ingin Langsung Meminjam? Klik Disini!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- R&T Lends -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="https://youtu.be/FgqwpCtZjIM" class="card border-left-warning shadow h-100 py-2"
                    style="text-decoration: none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <h5>Cara Melakukan Peminjaman? klik Disini!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('borrower.view_borrowing_requests') }}" class="card border-left-primary shadow h-100 py-2"
                    style="text-decoration: none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h5>Lihat Status Peminjaman? klik DIsini!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('borrower.view_borrowing_requests') }}" class="card border-left-danger shadow h-100 py-2"
                    style="text-decoration: none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    <h5>Tata Cara Melakukan Pengembalian. klik DIsini!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="card mb-5">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold" style="color: #028B91;">Tentang Kami</h5>
            </div>
            <div class="card-body ">
                <p>Selamat datang di RNT LENDS, RNT LENDS ialah aplikasi peminjaman ruangan dan alat praktikum
                    jurusan infomatika yang dapat diandalkan. Kami menyediakan solusi inovatif untuk memudahkan
                    Anda
                    dalam mencari dan meminjam ruangan serta peralatan praktikum yang Anda butuhkan.</p>
                <p>Kami memahami betapa melelahkannya mencari dan meminjam ruangan atau alat
                    praktikum
                    dengan cara yang lama. Oleh karena itu, RNT LENDS hadir untuk memberikan solusi yang mudah
                    dan efisien bagi kebutuhan peminjaman Anda.</p>
                <p>Dengan platform kami yang modern dan intuitif, Anda dapat dengan cepat dan mudah
                    menjelajahi pilihan ruangan yang lengkap serta beragam peralatan praktikum yang kami
                    sediakan.
                    Kami menawarkan ruangan yang dilengkapi dengan baik dan berbagai peralatan praktikum yang
                    lengkap, memastikan Anda memiliki segala yang dibutuhkan untuk sukses dalam kegiatan
                    praktikum
                    Anda.</p>
            </div>
        </div>


        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio" style="overflow: hidden">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active"><button onclick="filterImages('*')"
                                    style="border: none;">Semua</button>
                            </li>
                            <li data-filter=".filter-app" onclick="filterImages('filter-app')" style="border: none;">Ruangan
                            </li>
                            <li data-filter=".filter-card"><button onclick="filterImages('filter-card')"
                                    style="border: none;">Alat</button></li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150" class="image filter-app">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan1.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-alat"
                        style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Alat 1</h4>
                                <p>Alat</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Alat 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-aos="fade" data-aos-delay="400"
                        style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="transition: opacity 0.5s ease;">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('img/ruangan2.jpg') }}" class="img-fluid" alt=""
                                style="width: 600px; height: 200px;">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Portfolio Section -->
    </div>
    <!-- /.container-fluid -->
@endsection

@push('body')
    <script>
        function filterImages(filter) {
            var images = document.getElementsByClassName('portfolio-item');

            for (var i = 0; i < images.length; i++) {
                if (filter === '*') {
                    fadeIn(images[i]);
                } else if (images[i].classList.contains(filter)) {
                    fadeIn(images[i]);
                } else {
                    fadeOut(images[i]);
                }
            }
        }

        function fadeIn(element) {
            element.style.opacity = 0;
            element.style.display = 'block';

            var opacity = 0;
            var timer = setInterval(function() {
                if (opacity >= 1) {
                    clearInterval(timer);
                }
                element.style.opacity = opacity;
                opacity += 0.1;
            }, 50);
        }

        function fadeOut(element) {
            element.style.opacity = 1;

            var opacity = 1;
            var timer = setInterval(function() {
                if (opacity <= 0) {
                    element.style.display = 'none';
                    clearInterval(timer);
                }
                element.style.opacity = opacity;
                opacity -= 0.1;
            }, 50);
        }
    </script>
@endpush
