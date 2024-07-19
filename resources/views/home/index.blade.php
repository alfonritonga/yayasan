<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Home</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/imgs/theme/favicon.svg') }}" /> --}}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css?v=1.0') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/blob.css') }}" />
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="loader">
            <span>Y</span>
            <span>L</span>
            <span>K</span>
            <span>A</span>
        </div>
    </div>
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a href="/" class="d-flex"><img alt="YLKA"
                                src="{{ asset('front/imgs/LogoYLKA.png') }}" width="170px" /></a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/tentang">Tentang Kami</a></li>
                                <li><a href="/program">Program</a></li>
                                <li><a href="/media-materi">Media & Materi</a></li>
                                <li><a href="/donasi">Donasi</a></li>
                                <li><a href="/lowongan-kerja">Lowongan Kerja</a></li>
                                <li><a href="/kontak">Kontak</a></li>
                            </ul>
                        </nav>
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/tentang">Tentang Kami</a></li>
                                <li><a href="/program">Program</a></li>
                                <li><a href="/media-materi">Media & Materi</a></li>
                                <li><a href="/donasi">Donasi</a></li>
                                <li><a href="/lowongan-kerja">Lowongan Kerja</a></li>
                                <li><a href="/kontak">Kontak</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="banner-imgs mt-5">
                                <div class="blob-container">
                                    <div class="svg-wrapper">
                                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" id="blob"
                                            width="100%" height="100%" class="blob-home">
                                            <path
                                                d="M47.6,-24.4C59.8,-6.5,66.3,17.7,57.4,33.1C48.5,48.5,24.2,55.1,1,54.5C-22.3,53.9,-44.5,46.2,-57.2,28.6C-69.9,11,-73.1,-16.5,-62,-33.8C-50.8,-51.1,-25.4,-58.2,-3.8,-56C17.8,-53.8,35.5,-42.3,47.6,-24.4Z"
                                                transform="translate(100 100)" />
                                        </svg>
                                    </div>
                                    <div class="img-wrapper blob-image">
                                        <img alt="YLKA" src="{{ asset('asset/Rectangle 2120.png') }}"
                                            class="img-responsive shape-1" />
                                    </div>
                                </div>
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
                    <div class="col-lg-6 py-5">
                        <div class="box-image-findjob box-image-about ml-0">
                            <div class="blob-container">
                                <div class="svg-wrapper">
                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" id="blob"
                                        width="100%" height="100%" style="width:450px">
                                        <path
                                            d="M47.6,-24.4C59.8,-6.5,66.3,17.7,57.4,33.1C48.5,48.5,24.2,55.1,1,54.5C-22.3,53.9,-44.5,46.2,-57.2,28.6C-69.9,11,-73.1,-16.5,-62,-33.8C-50.8,-51.1,-25.4,-58.2,-3.8,-56C17.8,-53.8,35.5,-42.3,47.6,-24.4Z"
                                            transform="translate(100 100)" />
                                    </svg>
                                </div>
                                <div class="img-wrapper" style="width: 400px">
                                    <img alt="YLKA" src="{{ asset('front/imgs/program-no-bg.png') }}"
                                        class="img-responsive shape-1" />
                                </div>
                            </div>
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
                                    <div id="flush-collapseOne-{{ $x->id }}"
                                        class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                        data-bs-parent="#accordionFlushExample">
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
        @foreach ($achievements as $i)
            <section class="section-box mt-90 banner-homepage-3">
                <div class="container py-5">
                    <h2 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">
                        Pencapaian Tahun
                        {{ $i->year }}</h2>
                    <div class="row mt-50">
                        <div class="col-lg-6 px-5 mb-5">
                            <div style="border-right: 2px solid #bdbdbc">
                                <h5 class="text-brand mb-2"><strong>Program Kerja Terlaksana</strong></h5>
                                @foreach ($i->programs as $j)
                                    <p class="achievement-text"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="#fd0249"
                                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg> {{ $j->program }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 px-5 mb-5">
                            <div>
                                <h5 class="text-brand mb-2">
                                {{-- <strong>Total Donasi Diterima</strong> --}}
                                </h5>
                                <ul class="ul-lists py-0">
                                    @foreach ($i->donations as $j)
                                        <li class="achievement-text" style="color: #fd0249 !important"> <span
                                                style="color: black !important">{{ $j->name . ' : Rp. ' . number_format($j->total_donation, 0, '.', '.') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if ($i->media != null && $i->url_video != null)
                            <div class="col-lg-12 mb-4 py-5">
                                <div>
                                    <a href="{{ $i->url_video }}" target="_blank">
                                        <img src="{{ asset($i->media) }}" class="w-100 shadow-1-strong rounded mb-4"
                                            alt="Mountains in the Clouds" />
                                        <div class="play"><img src="{{ asset('front/imgs/play.svg') }}"><span>Watch
                                                Full
                                                Video</span></div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endforeach
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
                    Rilisan berita terbaru dari Yayasan Lentera Kasih Agape
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
                                                    <figure style="max-height: 200px"><img alt="YLKA"
                                                            src="{{ $x->media }}" />
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
                                                        href="/blog/{{ $x->slug }}">{{ \Illuminate\Support\Str::limit($x->title, 50, $end = '...') }}</a>
                                                </h5>
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
                <div class="donation-box p-30 mobileResponsive_">
                    <div class="row pt-30 pl-90 text-center justify-content-md-center">
                        <div class=" col-7">
                            <h5>Donasi anda sangat berarti bagi kami</h5>
                        </div>
                        <div class="col-2 pattern-donation">
                            <img src="{{ asset('front/imgs/social/pattern.svg') }}">
                        </div>
                        <div class="col-3">
                            <a href="{{ route('landing_donasi') }}"
                                class="btn btn-donasi py-3 font-heading">Donasi
                                Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="donation-box p-30 mobileResponsive" style="display: none;">
                    <div class="row pt-20 text-center justify-content-md-center">
                        <div class=" col-12">
                            <h5 style="text-align:center; margin-left: 2%;">Donasi anda sangat berarti bagi kami</h5>
                        </div>
                        <div class="col-12 mt-10">
                            <a href="{{ route('landing_donasi') }}"
                                class="btn btn-donasi py-3 font-heading">Donasi
                                Sekarang</a>
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
                                        <input type="email" id="email" name="email"
                                            class="input-newsletter-2" value="" placeholder="Alamat email"
                                            required />
                                    </div>
                                    <div class="col-md-3"><button type="submit"
                                            class="btn btn-subcribe font-heading">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/tentang">Tentang Kami</a></li>
                                    <li><a href="/program">Program</a></li>
                                    <li><a href="/media-materi">Media & Materi</a></li>
                                    <li><a href="/donasi">Donasi</a></li>
                                    <li><a href="/lowongan-kerja">Lowongan Kerja</a></li>
                                    <li><a href="/kontak">Kontak</a></li>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('front/js/main.js?v=1.0') }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7SRR3L8JHR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7SRR3L8JHR');
    </script>
    <script>
        $(document).ready(function() {
            $('#formSubscribe').submit(function(event) {
                event.preventDefault();
                var email = $('#email').val();
                var formData = $('#formSubscribe').serialize();
                $.ajax({
                    url: '/subscription',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#email').val('');
                        swal("Success", "Subscribe added successfully!", "success");
                    },
                    error: function(error) {
                        alert('Terjadi kesalahan');
                    }
                });
            });
        });
    </script>
</body>

</html>
