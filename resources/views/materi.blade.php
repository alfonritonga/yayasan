<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Materi dan Galery</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('front/imgs/theme/favicon.svg') }}" />
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
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35 article">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Artikel Terbaru
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Rilisan berita terbaru dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row pr-15 pl-15">
                    @foreach($article as $i)
                        <div class="col-lg-4 mb-30">
                            <div class="card-blog-1 bg-white hover-up wow animate__animated animate__fadeIn"
                                data-wow-delay=".0s">
                                <figure class="post-thumb mb-15" style="max-height: 200px">
                                    <a href="{{ route('article_detail', $i->slug) }}"
                                        target="_blank">
                                        <img alt="jobhub" src="{{ asset($i->media) }}" />
                                    </a>
                                </figure>
                                <div class="card-block-info text-dark">
                                    <div class="post-meta text-muted d-flex align-items-center mb-15">
                                        <div class="date">
                                            <span><i
                                                    class="fi-rr-edit mr-5 text-grey-6"></i>{{ date('l, d F Y', strtotime($i->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <h3 class="post-title mb-15"><a
                                            href="{{ route('article_detail', $i->slug) }}"
                                            target="_blank">{{ \Illuminate\Support\Str::limit($i->title, 45, $end = '...') }}</a>
                                    </h3>
                                    <p class="post-excerpt text-muted">
                                        {!! \Illuminate\Support\Str::limit($i->description, 97, $end = '...') !!}</p>
                                    <div class="card-2-bottom mt-30">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="keep-reading">
                                                <a href="{{ route('article_detail', $i->slug) }}"
                                                    target="_blank" target="_blank" class="text-fix"><strong>BACA
                                                        SELENGKAPNYA</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="paginations d-flex justify-content-center">
                    {{ $article->links() }}
                </div>
            </div>
        </section>
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Materi
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Materi dan Buku dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
                <div class="row mt-70 mb-50">
                    @foreach($materi as $i)
                        <div class="col-lg-6">
                            <div class="post-listing">
                                <div class="card-blog-1 mb-30 post-list hover-up wow animate__animated animate__fadeIn"
                                    data-wow-delay=".0s">
                                    <figure class="post-thumb" style="max-height: 175px">
                                        <a href="blog-single.html">
                                            <img alt="jobhub" src="{{ asset($i->image) }}" />
                                        </a>
                                    </figure>
                                    <div class="card-block-info">
                                        <h5 class="post-title mb-15">{{ $i->title }}</h5>
                                        <p>Rp.
                                            {{ number_format($i->price, 0, '.', '.') }}
                                        </p>
                                        <a href="{{ $i->pdf }}" target="_blank" class="text-fix mt-2"><strong>PREVIEW</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="paginations d-flex justify-content-center">
                    {{ $materi->links() }}
                </div>
            </div>
        </section>
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35">
            <div class="container galery-photo">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Galeri Foto
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Dokumentasi foto terbaru dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
                <div class="row">
                    @php
                        $jlh = (int) floor(count($photos) / 3);
                    @endphp
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        @foreach(array_slice($photos, 0, $jlh) as $i)
                            <div class="img-photo">
                                <img src="{{ $i['media'] }}" class="w-100 shadow-1-strong mb-2"
                                    class="img-fluid" />
                                <div class="cap">{{ $i['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        @foreach(array_slice($photos, $jlh, $jlh) as $i)
                            <div class="img-photo">
                                <img src="{{ $i['media'] }}" class="w-100 shadow-1-strong mb-2"
                                    class="img-fluid" />
                                <div class="cap">{{ $i['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        @foreach(array_slice($photos, $jlh + $jlh) as $i)
                            <div class="img-photo">
                                <img src="{{ $i['media'] }}" class="w-100 shadow-1-strong mb-2"
                                    class="img-fluid" />
                                <div class="cap">{{ $i['title'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Galeri Video
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Dokumentasi video terbaru dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
                <div class="row mt-70 mb-150">
                    @if(count($videos) != 0)
                        <div class="col-lg-12 mb-4 mb-lg-0">
                            <div>
                                <a href="{{ $videos[0]->url_video }}" target="_blank">
                                    <img src="{{ asset($videos[0]->media) }}"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                                    <div class="play"><img
                                            src="{{ asset('front/imgs/play.svg') }}"><span>Watch
                                            Full
                                            Video</span></div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                @if(count($videos) > 1)
                    <div class="row mb-150">
                        @foreach($videos as $key => $i)
                            @php
                                if ($key == 0) {
                                continue;
                                }
                            @endphp
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <div style="cursor: pointer">
                                    <a href="{{ $i->url_video }}" target="_blank">
                                        <img src="{{ asset($i->media) }}" class="w-100 shadow-1-strong rounded mb-4"
                                            alt="Mountains in the Clouds" />
                                        <div class="cap">{{ $i->title }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
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
                                        <input type="email" id="email" name="email" class="input-newsletter-2" value=""
                                            placeholder="Alamat email" required />
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
                        <a href="#"><img
                                src="{{ asset('front/imgs/social/Group 163144.svg') }}"
                                alt="YLKA" /></a>
                        <a href="#"><img
                                src="{{ asset('front/imgs/social/Group 163145.svg') }}"
                                alt="YLKA" /></a>
                        <a href="#"><img
                                src="{{ asset('front/imgs/social/Group 163146.svg') }}"
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
        $(document).ready(function () {
            $('#formSubscribe').submit(function (event) {
                event.preventDefault();
                var email = $('#email').val();
                var formData = $('#formSubscribe').serialize();
                $.ajax({
                    url: '/subscription',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#email').val('');
                        swal("Success", "Subscribe added successfully!", "success");
                    },
                    error: function (error) {
                        alert('Terjadi kesalahan');
                    }
                });
            });
        });
    </script>
</body>

</html>