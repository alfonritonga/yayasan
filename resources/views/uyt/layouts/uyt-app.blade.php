<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8" />
    <title>Use Your Talents Indonesia &mdash; @yield('title', 'Beranda')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Use Your Talents (UYT) Indonesia - Melihat Apa yang Tuhan Percayakan. Menggunakannya Menjadi Berkat." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/imgs/faviconylka.png') }}" />
    <!-- Template CSS (sama persis dengan materi.blade.php & tentang.blade.php) -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css?v=1.1') }}" />

    <style>
        /* UYT accent color override - hanya override warna utama saja */
        .uyt-accent { color: #fd0249; }
        .uyt-bg-accent { background-color: #fd0249; }
        .uyt-section-header { 
            font-size: 15px;
            background: #fff8f0;
            border-left: 4px solid #fd0249;
            padding: 8px 16px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #fd0249;
        }
        .uyt-box {
            border: 1.5px solid #E8E8E8;
            border-radius: 10px;
            padding: 30px 32px;
            margin-bottom: 28px;
            background: #fff;
        }
        .uyt-box-title {
            font-size: 20px;
            font-weight: 700;
            color: #05264e;
            padding-bottom: 12px;
            margin-bottom: 20px;
            border-bottom: 2px solid #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }
        .uyt-box-title .badge-label {
            font-size: 12px;
            font-weight: 600;
            background: #fff0f0;
            color: #fd0249;
            border: 1px solid #ffd6d6;
            border-radius: 20px;
            padding: 4px 12px;
        }
        .uyt-download-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 18px;
            margin-bottom: 10px;
            transition: all 0.2s ease;
            text-decoration: none;
            color: #333;
        }
        .uyt-download-row:hover {
            border-color: #fd0249;
            background: #fff8f8;
            color: #fd0249;
        }
        .uyt-download-row .dl-label { font-weight: 600; font-size: 14px; }
        .uyt-download-row .dl-badge { 
            font-size: 12px; font-weight: 700;
            background: #333; color: #fff;
            border-radius: 4px; padding: 3px 10px;
        }
        /* Navbar UYT Header Styling */
        .header .main-menu {
            display: flex;
            align-items: center;
        }
        .header .main-menu > li > a {
            padding: 10px 18px !important;
            font-size: 15px !important;
            font-weight: 600 !important;
            color: #2b3445 !important;
            transition: all 0.2s ease;
            position: relative;
        }
        .header .main-menu > li > a:hover {
            color: #fd0249 !important;
        }
        /* Dropdown sub-menu styling: bersihkan dan hilangkan titik bullet bawaan */
        .header .main-menu li ul {
            padding: 8px 0 !important;
        }
        .header .main-menu li ul li a {
            padding: 10px 20px !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #4a5568 !important;
            display: block !important;
            white-space: nowrap;
        }
        .header .main-menu li ul li a::after {
            display: none !important;
        }
        .header .main-menu li ul li a:hover {
            background-color: #fff0f3 !important;
            color: #fd0249 !important;
            padding-left: 24px !important;
        }
        /* Navbar UYT active state */
        .main-menu > li.uyt-active > a {
            color: #fd0249 !important;
            font-weight: 700 !important;
        }
        .main-menu > li.uyt-active > a::after {
            content: '';
            position: absolute;
            bottom: 0px;
            left: 18px;
            right: 18px;
            height: 3px;
            background: #fd0249;
            border-radius: 3px;
        }
        /* Link kembali ke YLKA */
        .uyt-nav-back {
            border-left: 1.5px solid #e0e0e0;
            padding-left: 20px !important;
            margin-left: 10px;
            font-size: 14px !important;
            color: #718096 !important;
            display: inline-flex !important;
            align-items: center;
            gap: 6px;
        }
        .uyt-nav-back:hover { 
            color: #fd0249 !important; 
        }
        /* Override hardcoded negative margin-left pada donation-box dari main.css */
        .donation-box {
            margin-top: 0 !important;
        }
        .donation-box h5 {
            margin-left: 0 !important;
            margin-top: 0 !important;
            text-align: center !important;
        }
        @media only screen and (max-width: 1250px) {
            .donation-box h5 { margin-left: 0 !important; margin-top: 0 !important; }
        }
        @media screen and (min-width: 767px) and (max-width: 991px) {
            .donation-box h5 { margin-left: 0 !important; margin-top: 0 !important; }
        }
        @media only screen and (max-width: 767px) {
            .donation-box h5 { margin-left: 0 !important; margin-top: 0 !important; text-align: center !important; }
            .donation-box .btn-donasi { width: auto !important; margin-left: 0 !important; margin-top: 10px !important; height: auto !important; }
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Preloader (sama seperti YLKA) -->
    <div id="preloader">
        <div class="loader">
            <span>U</span>
            <span>Y</span>
            <span>T</span>
        </div>
    </div>

    <!-- Header (struktur identik dengan materi.blade.php) -->
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a href="{{ route('uyt_index') }}" class="d-flex align-items-center">
                            <img alt="Use Your Talents" src="{{ asset('front/imgs/logo_uyt.png') }}" height="48px" />
                        </a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li class="{{ request()->routeIs('uyt_index') ? 'uyt-active' : '' }}">
                                    <a href="{{ route('uyt_index') }}">Beranda</a>
                                </li>
                                <li class="{{ request()->routeIs('uyt_cerita_dampak') ? 'uyt-active' : '' }}">
                                    <a href="{{ route('uyt_cerita_dampak') }}">Lihat Cerita dan Dampak</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#artikel">Artikel UYT</a></li>
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#video">Video UYT</a></li>
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#kirim-cerita">Kirim Ceritamu</a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('uyt_fasilitator') ? 'uyt-active' : '' }}">
                                    <a href="{{ route('uyt_fasilitator') }}">Fasilitator UYT</a>
                                </li>
                                <li class="{{ request()->routeIs('uyt_workshop') ? 'uyt-active' : '' }}">
                                    <a href="{{ route('uyt_workshop') }}">Jadilah Mitra Gerakan UYT</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('uyt_workshop') }}#apa-itu-mitra">Apa itu Mitra Gerakan</a></li>
                                        <li><a href="{{ route('uyt_workshop') }}#jenis-workshop">Jenis Workshop</a></li>
                                        <li><a href="{{ route('uyt_workshop') }}#form-pendaftaran">Form Pendaftaran Workshop</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/" class="uyt-nav-back"><span>&#8592;</span> Web YLKA</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Mobile burger (sama persis) -->
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

    <!-- Mobile Header (struktur identik dengan materi.blade.php) -->
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="header-logo">
                    <a href="{{ route('uyt_index') }}">
                        <img alt="UYT" src="{{ asset('front/imgs/logo_uyt.png') }}" height="40" />
                    </a>
                </div>
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
                                <li><a href="{{ route('uyt_index') }}">Beranda UYT</a></li>
                                <li class="has-children">
                                    <a href="{{ route('uyt_cerita_dampak') }}">Lihat Cerita dan Dampak</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#artikel">Artikel UYT</a></li>
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#video">Video UYT</a></li>
                                        <li><a href="{{ route('uyt_cerita_dampak') }}#kirim-cerita">Kirim Ceritamu</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('uyt_fasilitator') }}">Fasilitator UYT</a></li>
                                <li class="has-children">
                                    <a href="{{ route('uyt_workshop') }}">Jadilah Mitra Gerakan UYT</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('uyt_workshop') }}#apa-itu-mitra">Apa itu Mitra Gerakan</a></li>
                                        <li><a href="{{ route('uyt_workshop') }}#jenis-workshop">Jenis Workshop</a></li>
                                        <li><a href="{{ route('uyt_workshop') }}#form-pendaftaran">Form Pendaftaran Workshop</a></li>
                                    </ul>
                                </li>
                                <li><a href="/">&larr; Kembali ke Web YLKA</a></li>
                            </ul>
                            <!-- mobile menu end -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End header-->

    <!-- Content -->
    <main class="main">
        @yield('content')
    </main>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="footer pt-0" style="margin-top: 100px; position: relative;">
        <div class="container">
            <!-- CTA Banner Floating (persis 50% di atas garis footer, 50% di dalam footer) -->
            <div style="position: relative; z-index: 10; transform: translateY(-50%); margin-bottom: -40px;">
                <div style="background-color: #fd0249; border-radius: 12px; padding: 32px 40px; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; box-shadow: 0 16px 40px rgba(0,0,0,0.25);">
                    <div style="flex: 1; min-width: 280px; text-align: left;">
                        <h5 style="color: #fff; font-family: Rubik, sans-serif; font-size: 26px; font-weight: 700; letter-spacing: -0.5px; margin: 0; line-height: 1.35;">
                            Jadwalkan Workshop Use Your Talents di Gereja / Komunitas Anda
                        </h5>
                    </div>
                    <img src="{{ asset('front/imgs/social/pattern.svg') }}" alt="" style="flex-shrink: 0; display: none;" class="d-lg-block">
                    <a href="{{ route('uyt_workshop') }}#form-pendaftaran" style="background-color: #fff; color: #fd0249; font-weight: 700; border-radius: 6px; padding: 14px 28px; white-space: nowrap; text-decoration: none; font-family: Rubik, sans-serif; font-size: 15px; flex-shrink: 0; transition: all 0.2s ease;">
                        Daftar Workshop
                    </a>
                </div>
            </div>

            <div class="row text-center">
                <div class="row text-center justify-content-md-center">
                    <div class="box-newsletter-2 mt-40">
                        <h5 class="text-md-newsletter-subcribe">Use Your Talents Indonesia</h5>
                        <h6 class="text-lg-newsletter-2 pt-15">Gerakan pemberdayaan berbasis aset &amp; talenta di bawah naungan Yayasan Lentera Kasih Agape</h6>
                        <div class="mt-30">
                            <p class="text-muted" style="font-size: 14px;">
                                &copy; {{ date('Y') }} Use Your Talents Indonesia &bull; Yayasan Lentera Kasih Agape. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                    <div class="mobile-social-icon mt-50">
                        <a href="https://www.instagram.com/ylka_lenterakasihagape"><img src="{{ asset('asset/social/instagram.png') }}" alt="Instagram" /></a>
                        <a href="https://www.facebook.com/lenterakasihagape"><img src="{{ asset('asset/social/facebook.png') }}" alt="Facebook" /></a>
                        <a href="https://www.youtube.com/channel/UC7JWCqX0uDWZVtmYYdolhXw"><img src="{{ asset('asset/social/youtubee.png') }}" alt="Youtube" /></a>
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
                                    <li><a href="{{ route('uyt_index') }}">Beranda UYT</a></li>
                                    <li><a href="{{ route('uyt_cerita_dampak') }}">Cerita &amp; Dampak</a></li>
                                    <li><a href="{{ route('uyt_fasilitator') }}">Fasilitator UYT</a></li>
                                    <li><a href="{{ route('uyt_workshop') }}">Workshop &amp; Mitra</a></li>
                                    <li><a href="/">Web YLKA</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Vendor JS (sama persis seperti materi.blade.php & tentang.blade.php) -->
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
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!-- Template JS -->
    <script src="{{ asset('front/js/main.js?v=1.0') }}"></script>
    <!-- SweetAlert2 (untuk form submission UYT) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
