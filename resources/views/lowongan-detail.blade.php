<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Lowongan Pekerjaan</title>
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
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                        <div class="content-single content-except">
                            <a href="{{ route('lowongan') }}" class="text-dark"><strong><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                    </svg> Lowongan kerja / {{ $job->title }}</strong> </a>
                            <div class="my-3">
                                <span class="border border-secondary rounded px-3 py-2">{{ $job->location }}</span>
                                <span
                                    class="border border-secondary rounded px-3 py-2">{{ $job->type == 1 ? 'Full Time' : 'Part Time' }}</span>
                            </div>
                            <div class="mb-3">
                                <h3><strong>{{ $job->title }}</strong></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                </svg> Posted
                                {{ $job->created_at->diffForHumans(['syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW]) }}
                                </p>
                            </div>
                            <div>
                                <button type="button" class="btn btn-fix mb-2 mr-2"><strong>LAMAR PEKERJAAN
                                        INI</strong>
                                </button>
                            </div>
                            {!! $job->description !!}
                            <div>
                                <p>
                                    <strong>Batas Akhir Pengiriman:</strong><br>
                                    {{ date('d F Y', strtotime($job->to)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mb-200 mt-50 bg-dark-green">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                        <div class="single-recent-jobs mt-3 py-5">
                            <h4 class="text-white"><span>Lowongan kerja lainnya</span></h4>
                            <div class="list-recent-jobs">
                                @foreach ($other_jobs as $i)
                                    <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                        <div class="card-job-top">
                                            <div class="card-job-top--info pl-0">
                                                <div class="mb-3">
                                                    <span
                                                        class="border border-secondary rounded px-3 py-2">{{ $i->location }}</span>
                                                    <span
                                                        class="border border-secondary rounded px-3 py-2">{{ $i->type == 1 ? 'Full Time' : 'Part Time' }}</span>
                                                </div>
                                                <h5 class="card-job-top--info-heading">{{ $i->title }}</h5>
                                                <div class="row">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-clock"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                                            <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                                        </svg> Posted
                                                        {{ $i->created_at->diffForHumans(['syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW]) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-job-description mt-20">
                                            <button type="button" class="btn btn-fix mb-2 mr-2"><strong>LAMAR
                                                    PEKERJAAN
                                                    INI</strong>
                                            </button>
                                            <a href="{{ route('lowongan_detail', $i->guid) }}"
                                                class="btn btn-fix-outline mb-2"><strong>DETAIL</strong></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <div class="col-2 pattern-donation">
                            <img src="{{ asset('front/imgs/social/pattern.svg') }}">
                        </div>
                        <div class="col-3">
                            <a href="{{ route('landing_donasi') }}" class="btn btn-donasi py-3 font-heading">Donasi
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
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('front/js/main.js?v=1.0') }}"></script>
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
