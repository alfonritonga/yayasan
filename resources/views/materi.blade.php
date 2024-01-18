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
                    <img src="{{ asset('front/imgs/theme/loading.gif')}}" alt="YLKA" />
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
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35 article">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Artikel Terbaru
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Rilis berita terbaru dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
                <div class="row mt-70 mb-150">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-3">
                            <div class="swiper-wrapper pb-60 pt-5">
                                @foreach($article as $x)
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
                                            <h5 class="mt-15 heading-md"><a href="/blog/{{ $x->slug }}">{{ $x->title
                                                    }}</a></h5>
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
                <div class="row mt-70 mb-150">
                    <div class="col-6 materi-p">
                        <div class="row">
                            <div class="col-6">
                                <figure><img alt="YLKA"
                                        src="https://blog.unmc.edu/fwc/wp-content/uploads/sites/32/2018/09/IMG_4916.png"
                                        class="image-materi" />
                                </figure>
                            </div>
                            <div class="col-6">
                                <div class="title-materi">Kisahku dari Sumbah Timur</div>
                                <div class="price-materi">Rp 200.000</div>
                                <div class="preview-materi">preview</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-40 mb-40 mb-md-0 p-20 pt-35">
            <div class="container">
                <div class="mw-650">
                    <h4 class="text-center wow animate__animated animate__fadeInUp">Galeri Foto
                    </h4>
                    <p class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                        Dokumentasi foto terbaru dari Yayasan Lentera Kasih Agape
                    </p>
                </div>
                <div class="row">
                    @foreach($article as $x)
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                    class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                                <div class="cap">{{ $x->title }}</div>
                            </div>
                        </div>
                    @endforeach
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
                    <div class="col-lg-12 mb-4 mb-lg-0">
                        <div class="">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                            <div class="play"><img src="{{ asset('front/imgs/play.svg') }}"><span>Watch Full Video</span></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-150">
                    @foreach($article as $x)
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                    class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                                <div class="cap">{{ $x->title }}</div>
                            </div>
                        </div>
                    @endforeach
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