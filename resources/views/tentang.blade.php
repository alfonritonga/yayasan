<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Job Board HTML Website Template</title>
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
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="user-account">
                    <img src="assets/imgs/avatar/ava_1.png" alt="YLKA" />
                    <div class="content">
                        <h6 class="user-name">Howdy, <span class="text-brand">AliThemes</span></h6>
                        <p class="font-xs text-muted">You have 2 new messages</p>
                    </div>
                </div>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-search mobile-header-border mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search for items…" />
                            <i class="fi-rr-search"></i>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children">
                                    <a class="active" href="index.html">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="job-grid.html">Browse Jobs</a>
                                    <ul class="sub-menu">
                                        <li><a href="job-grid.html">Job Grid</a></li>
                                        <li><a href="job-grid-2.html">Job Grid 2</a></li>
                                        <li><a href="job-list.html">Job List</a></li>
                                        <li class="hr"><span></span></li>
                                        <li><a href="job-single.html">Job Single 01</a></li>
                                        <li><a href="job-single-2.html">Job Single 02</a></li>
                                        <li><a href="job-single-3.html">Job Single 03</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="employers-grid.html">Employers</a>
                                    <ul class="sub-menu">
                                        <li><a href="employers-grid.html">Employers Grid</a></li>
                                        <li><a href="employers-grid-2.html">Employers Grid 2</a></li>
                                        <li><a href="employers-list.html">Employers List</a></li>
                                        <li class="hr"><span></span></li>
                                        <li><a href="employers-single.html">Employers Single 01</a></li>
                                        <li><a href="employers-single-2.html">Employers Single 02</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="candidates-grid.html">Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                        <li><a href="candidates-grid-2.html">Candidates Grid 2</a></li>
                                        <li><a href="candidates-list.html">Candidates List</a></li>
                                        <li class="hr"><span></span></li>
                                        <li><a href="candidates-single.html">Candidates Single 01</a></li>
                                        <li><a href="candidates-single-2.html">Candidates Single 02</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid Sidebar</a></li>
                                        <li><a href="blog-list.html">Blog List</a></li>
                                        <li class="hr"><span></span></li>
                                        <li><a href="blog-single.html">Blog Single 01</a></li>
                                        <li><a href="blog-single-2.html">Blog Single 02</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-service.html">Our Services</a></li>
                                        <li><a href="page-pricing.html">Pricing Plan</a></li>
                                        <li><a href="pages-faqs.html">FAQs</a></li>
                                        <li><a href="page-contact.html">Contact Us</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-account">
                        <h6 class="mb-10">Your Account</h6>
                        <ul class="mobile-menu font-heading">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Work Preferences</a></li>
                            <li><a href="#">My Boosted Shots</a></li>
                            <li><a href="#">My Collections</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li><a href="#">Go Pro</a></li>
                            <li><a href="#">Sign Out</a></li>
                        </ul>
                    </div>
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-25">Follow Us</h6>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt="YLKA" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt="YLKA" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt="YLKA" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt="YLKA" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt="YLKA" /></a>
                    </div>
                    <div class="site-copyright">Copyright 2023 © YLKA. <br />Designed by AliThemes.</div>
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

                        <div id="carousel">

                            <div class="hideLeft">
                                <img src="https://i1.sndcdn.com/artworks-000165384395-rhrjdn-t500x500.jpg">
                            </div>

                            <div class="prevLeftSecond">
                                <img src="https://i1.sndcdn.com/artworks-000185743981-tuesoj-t500x500.jpg">
                            </div>

                            <div class="prev">
                                <img src="https://i1.sndcdn.com/artworks-000158708482-k160g1-t500x500.jpg">
                            </div>

                            <div class="selected">
                                <img src="https://i1.sndcdn.com/artworks-000062423439-lf7ll2-t500x500.jpg">
                            </div>

                            <div class="next">
                                <img src="https://i1.sndcdn.com/artworks-000028787381-1vad7y-t500x500.jpg">
                            </div>

                            <div class="nextRightSecond">
                                <img src="https://i1.sndcdn.com/artworks-000108468163-dp0b6y-t500x500.jpg">
                            </div>

                            <div class="hideRight">
                                <img src="https://i1.sndcdn.com/artworks-000064920701-xrez5z-t500x500.jpg">
                            </div>

                        </div>

                    </div>
                </div>
                <!-- <div class="box-banner-services mt-40">
                    <div class="box-banner-services--inner wow animate__animated animate__fadeInUp">
                        <figure><img alt="YLKA"
                                src="{{ asset('front/imgs/page/services/banner-our-services.png') }}" />
                        </figure>
                        <a href="https://www.youtube.com/watch?v=ea-I4sqgVGY" class="popup-youtube btn-play-2"></a>
                    </div>
                </div> -->
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
                                <figure><img alt="YLKA" src="{{ asset('front/imgs/ic_support.svg') }}" /></figure>
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
                                <figure><img alt="YLKA" src="{{ asset('front/imgs/ic_support2.svg') }}" />
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
                                <figure><img alt="YLKA" src="{{ asset('front/imgs/ic_support3.svg') }}" />
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
                    @foreach ($partner as $i)
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
            @if (count($partner[0]->lists) > 0)
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
                                    @foreach ($partner[0]->lists as $x)
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

        $(".box-mitra").click(function() {
            $(".box-mitra").removeClass("box-selected");
            $(this).addClass("box-selected");
        });

        function getPartnerList(id) {
            $.ajax({
                url: `/ajax/partner-list/${id}`,
                method: 'GET',
                success: function(res) {
                    $('#div-partner').html(res);
                    initiateSwiper();

                },
                error: function(error) {
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
                    renderCustom: function(swiper, current, total) {
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
