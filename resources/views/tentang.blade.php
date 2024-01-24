<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Tentang Kami</title>
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
        <section class="section-box">
            <div class="container pt-50">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 text-center">
                        <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">Tentang Yayasan
                            Lentera Kasih Agape</h1>
                        @php
                            $n = count($about_images);
                            $arr_class = [];
                            if ($n == 1) {
                            $arr_class[] = 'selected';
                            }
                            if ($n == 2) {
                            $arr_class[] = 'selected';
                            $arr_class[] = 'next';
                            }
                            if ($n == 3) {
                            $arr_class[] = 'prev';
                            $arr_class[] = 'selected';
                            $arr_class[] = 'next';
                            }
                            if ($n == 4) {
                            $arr_class[] = 'prev';
                            $arr_class[] = 'selected';
                            $arr_class[] = 'next';
                            $arr_class[] = 'nextRightSecond';
                            }
                            if ($n == 5) {
                            $arr_class[] = 'prevLeftSecond';
                            $arr_class[] = 'prev';
                            $arr_class[] = 'selected';
                            $arr_class[] = 'next';
                            $arr_class[] = 'nextRightSecond';
                            } else {
                            $arr_class[] = 'prevLeftSecond';
                            $arr_class[] = 'prev';
                            $arr_class[] = 'selected';
                            $arr_class[] = 'next';
                            $arr_class[] = 'nextRightSecond';
                            $position = 1; // 1 right, 0 left
                            for ($x = 0; $x < $n - 5; $x++) { if ($position==1) { $arr_class[]='hideRight' ;
                                $position=0; } else { $arr_class[]='hideLeft' ; $position=1; } } } </blade endphp>
                                @if($n != 0)
                                    <div id="carousel">
                                        @for($i = 0; $i < $n; $i++)
                                            <div class="{{ $arr_class[$i] }}">
                                                <img src="{{ asset($about_images[$i]->image) }}">
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-90 mb-50 mb-md-0">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Sejarah Yayasan Lentera Kasih Agape
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center sejarah wow animate__animated animate__fadeInUp">
                        {{ $landing_info->history }}</p>
                </div>

            </div>
        </section>
        <section class="section-box mt-90 mb-50 mb-md-0 p-20 pt-95 visi">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Visi, Misi, & Nilai
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        {{ $landing_info->visi_mission }}</p>
                </div>
                <div class="row mt-60">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                            <div class="block-image">
                                <figure><img alt="YLKA"
                                        src="{{ asset('front/imgs/ic_support.svg') }}" /></figure>
                            </div>
                            <div class="card-info-bottom">
                                <!-- <h3><span class="count">15</span>00+</h3>
                                <strong>Ready perfect jobs</strong> -->
                                <p class="text-mutted">Bekerjasama dengan dan menggerakkan gereja yang resmi dan mapan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="block-image">
                                <figure><img alt="YLKA"
                                        src="{{ asset('front/imgs/ic_support2.svg') }}" />
                                </figure>
                            </div>
                            <div class="card-info-bottom">
                                <!-- <h3><span class="count">8</span>00K</h3>
                                <strong>Candidate calls</strong> -->
                                <p class="text-mutted">Pelayanan anak dengan menggerakkan dan menguatkan gereja-gereja,
                                    pelayanan lokal dan lembaga untuk membawa harapan, iman dan kehidupan kepada
                                    anak-anak di Indonesia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="block-image">
                                <figure><img alt="YLKA"
                                        src="{{ asset('front/imgs/ic_support3.svg') }}" />
                                </figure>
                            </div>
                            <div class="card-info-bottom">
                                <!-- <h3><span class="count">12</span>00</h3>
                                <strong>Jobs posted</strong> -->
                                <p class="text-mutted">Melalui komunitas, menggerakkan masyarakat untuk menciptakan
                                    harapan dan masa depan yang lebih baik untuk kehidupan mereka.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Kemitraan
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        {{ $landing_info->partnership }}</p>
                </div>
                <div class="row no-gutters mt-60">
                    @php
                        $point = 2;
                    @endphp
                    @foreach($partner as $i)
                        <div class="col-md-6 box-mitra @if ($loop->first) box-selected @endif @if ($loop->iteration == $point) bg-light @endif"
                            onclick="getPartnerList({{ $i->id }})">
                            <div class="p-4">
                                <h5 class="mb-3 medium-heading">{{ $i->title }}</h5>
                                <p class="text-muted">{{ $i->description }}</p>
                            </div>
                        </div>
                        @php
                            if ($loop->iteration == $point) {
                            if ($loop->iteration % 2 == 0) {
                            $point += 1;
                            } else {
                            $point += 3;
                            }
                            }
                        @endphp
                    @endforeach
                </div>

            </div>
        </section>
        <div class="section-box wow animate__animated animate__fadeIn mt-70 mb-70" id="div-partner">
            @if(count($partner[0]->lists) > 0)
                <div class="container">
                    <div class="text-md-lh24 color-black-5 wow animate__animated animate__fadeInUp text-center">
                        Partner Kemitraan
                    </div>
                    <h4 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">
                        {{ $partner[0]->title }}
                    </h4>
                    <div class="row mt-50">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-5">
                                <div class="swiper-wrapper pb-70 pt-5">
                                    @foreach($partner[0]->lists as $x)
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
            @endif
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

        $(".box-mitra").click(function () {
            $(".box-mitra").removeClass("box-selected");
            $(this).addClass("box-selected");
        });

        function getPartnerList(id) {
            $.ajax({
                url: `/ajax/partner-list/${id}`,
                method: 'GET',
                success: function (res) {
                    $('#div-partner').html(res);
                    initiateSwiper();

                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        function initiateSwiper() {
            var swiper_2_items = new Swiper('.swiper-container', {
                spaceBetween: 30,
                slidesPerView: 6,
                spaceBetween: 30,
                slidesPerGroup: 1,
                centerInsufficientSlides: true,
                loop: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "custom",
                    renderCustom: function (swiper, current, total) {
                        var customPaginationHtml = "";
                        for (var i = 0; i < total; i++) {
                            //Determine which pager should be activated at this time
                            if (i == current - 1) {
                                customPaginationHtml +=
                                    '<span class="swiper-pagination-customs swiper-pagination-customs-active"></span>';
                            } else {
                                customPaginationHtml +=
                                    '<span class="swiper-pagination-customs"></span>';
                            }
                        }
                        return customPaginationHtml;
                    }
                },
                autoplay: {
                    delay: 10000
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 6
                    },
                    800: {
                        slidesPerView: 1
                    },
                    600: {
                        slidesPerView: 1
                    },
                    400: {
                        slidesPerView: 1
                    },
                    350: {
                        slidesPerView: 1
                    }
                }
            });
        }
    </script>
</body>

</html>