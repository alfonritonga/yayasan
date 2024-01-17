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
                    <img src="{{ asset('front/imgs/theme/loading.gif') }}" alt="YLKA" />
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
                        <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">Hubungi Kami</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-20 mb-50 mb-md-0">
            <div class="container">
                <div class="row mt-20">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div class="kontak">
                            <h4>Informasi Kontak</h4>
                            <div class="row mt-25">
                                <div class="col-1">
                                    <img src="{{ asset('front/imgs/map.svg') }}">
                                </div>
                                <div class="col-10">
                                    Kantor Pusat: Komplek Taman
                                    Setia Budi Indah Blok HH No. 69, Kelurahan Tanjung Rejo, Kecamatan Medan Sunggal,
                                    Kota Medan, Sumatera Utara. 20122.
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-1">
                                    <img src="{{ asset('front/imgs/phone.svg') }}">
                                </div>
                                <div class="col-10">
                                    0812 – 6330 - 3002
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-1">
                                    <img src="{{ asset('front/imgs/email.svg') }}">
                                </div>
                                <div class="col-10">
                                    lenterakasihagape@gmail.com
                                </div>
                            </div>

                            <a href="" class="mt-20 btn-open-map">Buka Google Map</a>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-md-30 align-items-center">
                        <div style="max-width:100%;overflow:hidden;color:red;width:500px;height:500px;">
                            <div id="my-map-display" style="height:100%; width:100%;max-width:100%;"><iframe
                                    style="height:100%;width:100%;border:0;" frameborder="0"
                                    src="https://www.google.com/maps/embed/v1/place?q=Yayasan+Lentera+Kasih+Agape,+Perumahan+Jalan+Taman+Setia+Budi+Indah,+Tanjung+Rejo,+Medan+City,+North+Sumatra,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                            </div><a class="code-for-google-map" href="https://www.bootstrapskins.com/themes"
                                id="get-map-data">premium bootstrap themes</a>
                            <style>
                                #my-map-display img.text-marker {
                                    max-width: none !important;
                                    background: none !important;
                                }

                                img {
                                    max-width: none
                                }
                            </style>
                        </div>
                    </div>

                </div>
                <section class="section-box mt-40 mb-120 mb-md-0 p-20 pt-35">
                    <div class="container">
                        <div class="mw-650">
                            <h4 class="text-center wow animate__animated animate__fadeInUp">Pengurus Yayasan Lentera
                                Kasih Agape
                            </h4>
                            <p
                                class="mb-30 mt-30 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                                Ada pertanyaan? Silahkan hubungi pengurus kami untuk informasi lebih lanjut
                            </p>
                        </div>
                        <div class="row mt-60">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid pengurus hover-up wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".0s">
                                    <div class="block-image">
                                        <figure><img alt="YLKA" src="{{ asset('front/imgs/contact.svg') }}" />
                                        </figure>
                                    </div>
                                    <div class="card-info-bottom">
                                        <h6>Christian Pakpahan</h6>
                                        <p class="text-mutted">061-8212465</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid pengurus hover-up wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".0s">
                                    <div class="block-image">
                                        <figure><img alt="YLKA" src="{{ asset('front/imgs/contact.svg') }}" />
                                        </figure>
                                    </div>
                                    <div class="card-info-bottom">
                                        <h6>Ribka Amalia</h6>
                                        <p class="text-mutted">0812-6330-3002</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid pengurus hover-up wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".0s">
                                    <div class="block-image">
                                        <figure><img alt="YLKA" src="{{ asset('front/imgs/contact.svg') }}" />
                                        </figure>
                                    </div>
                                    <div class="card-info-bottom">
                                        <h6>Nepen Marbun</h6>
                                        <p class="text-mutted">0877-3557-5443</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
    </script>
</body>

</html>
