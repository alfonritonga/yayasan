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
                    <img src="assets/imgs/theme/loading.gif" alt="YLKA" />
                </div>
            </div>
        </div>
    </div>
    @extends('home.menu')
    <!--End header-->
    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="container pt-50">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 text-center">
                        <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">Donasi dari anda
                            sangat berarti bagi kami</h1>
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
                    <p class="mb-30 mt-30 text-muted text-center sejarah wow animate__animated animate__fadeInUp">
                        Dukungan dari saudara sangat membantu Yayasan Lentera Kasih Agape untuk bisa terus maksimal
                        melayani.</p>
                </div>
                <div class="row mt-60">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp"
                            style="overflow: hidden;" data-wow-delay=".1s">
                            <div class="radio-button">
                                <img src="{{ asset('front/imgs/CheckCircle.png') }}">
                            </div>
                            <div class="rekening">
                                <img src="{{ asset('front/imgs/mandiri.png') }}">
                                <p class="no_rekening">Bank Mandiri Yayasan Lentera Kasih Agape
                                    <br><span>1050012466011</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp"
                            style="overflow: hidden;" data-wow-delay=".1s">
                            <div class="radio-button">
                                <img src="{{ asset('front/imgs/CheckCircle.png') }}">
                            </div>
                            <div class="rekening">
                                <img src="{{ asset('front/imgs/gift.png') }}">
                                <p class="no_rekening">Dengan memberikan Barang</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="formDonasi mt-100 mb-200">
                    <form class="contact-form-style mt-80" id="contact-form" action="#" method="post">
                        <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="Nama" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" placeholder="Email" type="email" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="telephone" placeholder="Nomor HP" type="tel" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="Pesan" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="Jenis barang" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="bukti" placeholder="Upload bukti transfer" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 text-center">
                                <button class="kirimdonasi" type="submit">Kirim Donasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>
    <!-- End Content -->
    <!-- Footer -->
    <footer class="footer pt-50" style="margin-top: -8px;">
        <div class="container">
            <div class="row text-center">
                <!-- <div class="donation-box p-30">
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
                </div> -->
                <div class="row text-center justify-content-md-center">
                    <div class="box-newsletter-2 mt-100">
                        <h5 class="text-md-newsletter-subcribe">Subscribe</h5>
                        <h6 class="text-lg-newsletter-2 pt-15">Berlangganan berita dan informasi terbaru:</h6>
                        <div class="mt-30 box-subscribe">
                            <form class="form-newsletter">
                                <div class="row text-center">
                                    <div class="col-md-5">
                                        <input type="text" class="input-newsletter-2" value=""
                                            placeholder="Alamat email" />
                                    </div>
                                    <div class="col-md-3"><button
                                            class="btn btn-subcribe font-heading">Subscribe</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="box-newsletter-bottom">
                    <div class="newsletter-bottom"></div>
                </div> -->
                    <div class="mobile-social-icon mt-50">
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163144.svg') }}" alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163145.svg') }}" alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Group 163146.svg') }}" alt="YLKA" /></a>
                        <a href="#"><img src="{{ asset('front/imgs/social/Mask group.svg') }}" alt="YLKA" /></a>
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
</body>

</html>