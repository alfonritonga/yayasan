<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css?v=1.0') }}" />
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('landing/imgs/loading.gif') }}" alt="YLKA" />
                </div>
            </div>
        </div>
    </div>
    @extends('home.menu')
    <!--End header-->
    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="banner-hero banner-homepage-3 bggrey">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="block-banner">
                                {{-- <span
                                    class="text-small-primary text-small-primary--disk text-uppercase  wow animate__animated animate__fadeInUp">Yayasan
                                    Lentera Kasih Agape</span> --}}
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">Yayasan Lentera Kasih
                                    Agape</h1>
                                <div class="banner-description mt-30 wow animate__animated animate__fadeInUp">
                                    {{ $landing_info->description }}</div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-imgs">
                                <img alt="YLKA" src="{{ asset('front/imgs/header.png') }}"
                                    class="img-responsive shape-1" />
                                <!-- <span class="banner-sm1"><img alt="YLKA"
                                        src="{{ asset('front/imgs/page/homepage3/banner-sm1.png') }}"
                                        class="img-responsive shape-3" /></span>
                                <span class="banner-sm2"><img alt="YLKA"
                                        src="{{ asset('front/imgs/page/homepage3/banner-sm2.png') }}"
                                        class="img-responsive shape-2" /></span>
                                <span class="banner-sm3"><img alt="YLKA"
                                        src="{{ asset('front/imgs/page/homepage3/banner-sm3.png') }}"
                                        class="img-responsive shape-2" /></span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-90">
            <div class="container">

                <h2 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">Program Kerja</h2>
                <div class="text-md-lh24 color-black-5 wow animate__animated animate__fadeInUp text-center">
                    Program Kerja dari Yayasan Lentera Kasih Agape
                </div>
                <div class="row mt-50">
                    <div class="col-lg-6">
                        <div class="box-image-findjob box-image-about ml-0">
                            <figure><img alt="YLKA" src="{{ asset('front/imgs/program.png') }}">
                            </figure>
                            <a href="https://www.youtube.com/watch?v=ea-I4sqgVGY"
                                class="btn-play-video popup-youtube"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($program as $x)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne-{{ $x->id }}"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseOne-{{ $x->id }}">
                                            {{ $x->title }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-{{ $x->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ $x->description }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section-box wow animate__animated animate__fadeIn mt-70">
            <div class="container">
                <div class="text-md-lh24 color-black-5 wow animate__animated animate__fadeInUp text-center">
                    Kemitraan
                </div>
                <h2 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">Partnership</h2>
                <div class="row mt-50">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-6">
                            <div class="swiper-wrapper pb-70 pt-5">
                                @foreach ($partner as $x)
                                    <div class="swiper-slide hover-up">
                                        <div class="item-logo">
                                            <a href="#">
                                                <img alt="YLKA" src="{{ $x->media }}" width="78" />
                                                <p>{{ $x->title }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-box mt-70 bggreen pt-50">
            <div class="container">
                <h2 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">Artikel Terbaru
                </h2>
                <div class="text-md-lh24 color-white wow animate__animated animate__fadeInUp text-center">
                    Rilis berita terbaru dari Yayasan Lentera Kasih Agape
                </div>
                <div class="row mt-70 mb-150">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-3">
                            <div class="swiper-wrapper pb-60 pt-5">
                                @foreach ($article as $x)
                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up">
                                            <div class="text-center card-grid-3-image">
                                                <a href="/blog/{{ $x->slug }}">
                                                    <figure><img alt="YLKA" src="{{ $x->media }}" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6 text-start">
                                                        <span>{{ $x->admin->first_name }}
                                                            {{ $x->admin->last_name }}</span>
                                                    </div>
                                                    <div class="col-lg-6 col-6 text-end">
                                                        <span>{{ date('d M Y', strtotime($x->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                <h5 class="mt-15 heading-md"><a
                                                        href="/blog/{{ $x->slug }}">{{ $x->title }}</a></h5>
                                                <div class="card-2-bottom mt-50">
                                                    <div class="row">
                                                        <div class="col-lg-9 col-8">
                                                            <a href="/blog/{{ $x->slug }}"
                                                                class="btn btn-border btn-brand-hover">Baca
                                                                Selengkapnya</a>
                                                        </div>
                                                        <!-- <div class="col-lg-3 text-end col-4">
                                                        <a href="#" class="mt-10 display-block mr-20"><img alt="YLKA"
                                                                src="{{ asset('front/imgs/theme/icons/bookmark.svg') }}" /></a>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination swiper-pagination3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- End Content -->
    <!-- Footer -->
    <footer class="footer pt-50" style="margin-top: -8px;">
        <div class="container">
            <div class="row text-center">
                <div class="donation-box p-30">
                    <div class="row pt-30 pl-90 text-center justify-content-md-center">
                        <div class=" col-7">
                            <h5>Donasi anda sangat berarti bagi kami</h5>
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('front/imgs/social/pattern.svg') }}">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-donasi font-heading">Donasi Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-md-center">
                    <div class="box-newsletter-2 mt-100">
                        <h5 class="text-md-newsletter-subcribe">Subscribe</h5>
                        <h6 class="text-lg-newsletter-2 pt-15">Berlangganan berita dan informasi terbaru:</h6>
                        <div class="mt-30 box-subscribe">
                            <form class="form-newsletter" id="formSubscribe">
                                @csrf
                                <div class="row text-center">
                                    <div class="col-md-5">
                                        <input type="email" id="email" class="input-newsletter-2"
                                            value="" placeholder="Alamat email" required />
                                    </div>
                                    <div class="col-md-3"><button type="button"
                                            class="btn btn-subcribe font-heading"
                                            onclick="addSubscribe()">Subscribe</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="box-newsletter-bottom">
                    <div class="newsletter-bottom"></div>
                </div> -->
                    <div class="mobile-social-icon mt-50">
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163144.svg') }}"
                                alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163145.svg') }}"
                                alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163146.svg') }}"
                                alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Mask group.svg') }}"
                                alt="YLKA" /></a>
                    </div>
                </div>
                <div class="footer-bottom mt-50">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('front/imgs/logo_white.svg') }}">
                        </div>
                        <div class="col-md-9 text-md-end text-start pt-15">
                            <nav class="nav-main-menu d-none d-xl-block">
                                <ul class="main-menu">
                                    <li><a href="index.html">Beranda</a></li>
                                    <li><a href="index.html">Tentang Kami</a></li>
                                    <li><a href="index.html">Program</a></li>
                                    <li><a href="index.html">Media & Materi</a></li>
                                    <li><a href="index.html">Donasi</a></li>
                                    <li><a href="index.html">Lowongan Kerja</a></li>
                                    <li><a href="index.html">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
    </footer>
    <!-- End Footer -->
    <!-- Vendor JS-->
    <script src="{{ asset('front/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('front/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('front/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('front/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('front/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('front/js/plugins/swiper-bundle.min.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('front/js/main.js?v=1.0') }}"></script>
    <script>
        function addSubscribe() {
            $.ajax({
                url: '/subscription',
                type: 'POST',
                data: $('#formSubscribe').serialize(), // Mengumpulkan data formulir
                success: function(response) {
                    alert('Berhasil subscribe');
                    $('#email').val('');
                },
                error: function(error) {
                    alert('Terjadi kesalahan');
                }
            });
        }
    </script>
</body>

</html>
