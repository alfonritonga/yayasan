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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/imgs/faviconylka.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css?v=1.0') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                <li><a href="/media-materi">Artikel & Galeri</a></li>
                                <li><a href="/donasi">Donasi</a></li>
                                <li><a href="/lowongan-kerja">Lowongan Kerja</a></li>
                                <li><a href="/kontak">Kontak</a></li>
                                <li><a href="https://market.lenterakasihagape.org">Market</a></li>
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


                    </div>
                </div>
            </div>
        </section>
        <section id="slick-content">
            <div class="slider">
                @foreach($about_images as $i)
                    <div>
                        <div class="slide-h3"
                            style="background-image: url('{{ asset($i->image) }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                            &nbsp;</div>
                    </div>

                @endforeach
                <!-- <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div>
                <div>
                    <div class="slide-h3" style="background-image: url('https://scontent.fcgk30-1.fna.fbcdn.net/v/t39.30808-6/326459941_740374507432414_4724457447640968010_n.jpg?stp=dst-jpg_p640x640&_nc_cat=105&ccb=1-7&_nc_sid=783fdb&_nc_ohc=lze4EkGCuD8AX_1ra4h&_nc_ht=scontent.fcgk30-1.fna&oh=00_AfBTFubJLrIil6pqK9IwPnUApbq_4j9yKLuAz5gnO5b2uQ&oe=65B60FA7'); background-repeat: no-repeat; background-position: center; background-size: cover;">&nbsp;</div>
                </div> -->
            </div>
        </section>
        <section class="section-box mb-50 mb-md-0 sejarah">
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
                                <!-- <h3><span class="count">15</span>00+</h3>-->
                                <strong>Visi</strong>
                                <p class="text-mutted">Terwujudnya Pelayanan Holistik di
                                    Komunitas Masyarakat Indonesia secara berkelanjutan - Indonesia Bagi
                                    Kristus.
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
                                <!-- <h3><span class="count">8</span>00K</h3> -->
                                <strong>Misi</strong>
                                <p class="text-mutted">Injil ke orang yang belum terjangkau,
                                    Injil ke generasi baru, Saling melayani, Saling mengasihi, Muridkanlah, Komunikasi
                                    yang
                                    inovatif, Kepengurusan yang bertanggung jawab.</p>
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
                                <!-- <h3><span class="count">12</span>00</h3>-->
                                <strong>Nilai - Nilai</strong>
                                <p class="text-mutted">Nilai Dinamis artinya YLKA senantiasa bergerak dan bergembang.
                                    Nilai Menghormati artinya
                                    YLKA senantiasa menjaga dan menjamin martabat setiap rekan kerja. Nilai Keterbukaan
                                    artinya YLKA senantiasa menjaga keterbukaan dan kebebasan dari setiap pihak yang
                                    berkerja sama. Nilai Membangun Kesatuan artinya YLKA senantiasa menghargai setiap
                                    perbedaan dan menjunjung persatuan untuk mencapai tujuan Bersama. Nilai Pelayanan
                                    adalah YLKA senantiasa melayani seperti Kristus melayani kita terlebih dahulu.</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
        integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            $('.slider').slick({
                centerMode: true,
                centerPadding: '20px',
                slidesToShow: 5,
                speed: 1500,
                index: 2,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
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