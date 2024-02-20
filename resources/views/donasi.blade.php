<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>YLKA - Donasi</title>
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
                    @if($message = Session::get('message'))
                        <div class="alert alert-primary alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    @endif
                </div>
                <div class="row mt-60 d-flex">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div class="card-grid h-100 hover-up wow animate__animated animate__fadeInUp"
                            style="overflow: hidden;" data-wow-delay=".1s">
                            <div class="radio-button">
                                <img src="{{ asset('front/imgs/CheckCircle_active.png') }}"
                                    id="donate-bank" class="checked"
                                    onclick="setClick(this, 'donate-bank', 'donate-item')">
                            </div>
                            <div class="rekening">
                                <img src="{{ asset('front/imgs/mandiri.png') }}">
                                <p class="no_rekening">Bank Mandiri Yayasan Lentera Kasih Agape
                                    <br><span>1050012466011</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div class="card-grid h-100 hover-up wow animate__animated animate__fadeInUp"
                            style="overflow: hidden;" data-wow-delay=".1s">
                            <div class="radio-button">
                                <img src="{{ asset('front/imgs/CheckCircle.png') }}"
                                    id="donate-item" class="unchecked"
                                    onclick="setClick(this, 'donate-item', 'donate-bank')">
                            </div>
                            <div class="rekening">
                                <img src="{{ asset('front/imgs/gift.png') }}">
                                <p class="no_rekening">Dengan memberikan Barang</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formDonasi mt-100 mb-200">
                    <form class="contact-form-style mt-80" id="contact-form" method="post" enctype="multipart/form-data"
                        action="{{ route('donation_add_post') }}">
                        @csrf
                        <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input type="hidden" name="type" id="type" value="1">
                                    <input name="name" class="form-control" placeholder="Nama" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" class="form-control" placeholder="Email" type="email" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="phone" class="form-control" placeholder="Nomor HP" type="tel" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="message" class="form-control" placeholder="Pesan" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20" id="input-donate-bank">
                                    <input name="amount" class="form-control" placeholder="Jumlah Donasi" type="text" />
                                </div>
                                <div class="input-style mb-20 d-none" id="input-donate-item">
                                    <input name="type_of_goods" class="form-control" placeholder="Jenis barang"
                                        type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="input-file-text"
                                            placeholder="Upload bukti transfer" aria-describedby="button-addon2">
                                        <input type="file" id="input-file" name="media" hidden onchange="getFile()">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                            onclick="openUpload()"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-upload"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                <path
                                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                            </svg></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 text-center">
                                <button class="btn w-100 btn-fix" type="submit">KIRIM DONASI</button>
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
                        <div class="col-2 pattern-donation">
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
        function openUpload() {
            $('#input-file').click();
        }

        function getFile() {
            var fileName = $('#input-file').val().split('\\').pop();
            $('#input-file-text').val(fileName);
            $('#input-file-text').attr('readonly', true);
        }

        function setClick(el, idchecked, idunchecked) {
            if (el.className == 'unchecked') {
                $('#' + idchecked).attr('src',
                "{{ asset('front/imgs/CheckCircle_active.png') }}");
                $('#' + idunchecked).attr('src', "{{ asset('front/imgs/CheckCircle.png') }}");
                $('#input-' + idchecked).removeClass('d-none');
                $('#' + idchecked).removeClass('unchecked');
                $('#' + idchecked).addClass('checked');
                $('#' + idunchecked).removeClass('checked');
                $('#' + idunchecked).addClass('unchecked');
                $('#input-' + idunchecked).addClass('d-none');

                $('#input-file').val();
                $('#input-file-text').attr('readonly', false);
                $('#input-file-text').val('');
                if (idchecked == 'donate-bank') {
                    $('#input-file-text').attr('placeholder', 'Upload bukti transfer');
                    $('#type').val(1);
                } else {
                    $('#input-file-text').attr('placeholder', 'Upload bukti pengiriman barang');
                    $('#type').val(2);
                }
            }
        }


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