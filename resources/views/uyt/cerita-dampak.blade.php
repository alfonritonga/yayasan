@extends('uyt.layouts.uyt-app')

@section('title', 'Cerita & Dampak UYT')

@section('styles')
<style>
    .uyt-page-hero {
        background: linear-gradient(135deg, #05264e 0%, #111e38 60%, #1a1a2e 100%);
        padding: 60px 0 65px;
        position: relative;
    }
    .uyt-page-hero h2 { color: #fff; font-size: 36px; font-weight: 800; margin-bottom: 14px; }
    .uyt-page-hero p { color: rgba(255,255,255,0.8); font-size: 15px; line-height: 1.7; }
    .uyt-label {
        display: inline-block;
        background: rgba(253,2,73,0.15);
        color: #ff6b95;
        font-size: 12px; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase;
        padding: 5px 14px; border-radius: 20px;
        margin-bottom: 12px;
        border: 1px solid rgba(253,2,73,0.3);
    }
    .uyt-label-dark {
        display: inline-block;
        background: #fff0f3;
        color: #fd0249;
        font-size: 12px; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase;
        padding: 5px 14px; border-radius: 20px;
        margin: 0 auto 12px;
    }
    .mw-650 {
        text-align: center;
    }
    .uyt-hero-nav-btn {
        background: rgba(255,255,255,0.1);
        color: #fff !important;
        border: 1.5px solid rgba(255,255,255,0.25);
        border-radius: 30px;
        padding: 9px 22px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }
    .uyt-hero-nav-btn:hover, .uyt-hero-nav-btn.active {
        background: #fd0249;
        border-color: #fd0249;
        color: #fff !important;
    }
    /* Story form */
    .uyt-form-card {
        background: #fff;
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 8px 40px rgba(0,0,0,0.08);
    }
    .uyt-form-card .form-control {
        border-radius: 8px;
        border: 1.5px solid #e8e8e8;
        padding: 12px 16px;
        transition: border-color 0.2s;
    }
    .uyt-form-card .form-control:focus { border-color: #fd0249; outline: none; box-shadow: none; }
    .uyt-btn-submit {
        background: #fd0249; color: #fff;
        border: none; border-radius: 8px;
        padding: 14px 36px; font-weight: 700;
        font-size: 15px; cursor: pointer;
        transition: all 0.2s ease;
    }
    .uyt-btn-submit:hover { background: #c8003a; }
</style>
@endsection

@section('content')

    <!-- ===== Page Hero ===== -->
    <section class="uyt-page-hero">
        <div class="container text-center">
            <span class="uyt-label">Dokumentasi &amp; Dampak Nyata</span>
            <h2 class="wow animate__animated animate__fadeInUp">Cerita dan Dampak UYT</h2>
            <p class="wow animate__animated animate__fadeInUp" style="max-width: 600px; margin: 0 auto;">
                Kumpulan artikel lapangan, galeri video workshop, dan kisah inspiratif dari berbagai gereja &amp; komunitas yang telah menjalani proses UYT.
            </p>
            <div class="mt-25 d-flex justify-content-center flex-wrap wow animate__animated animate__fadeInUp" style="gap: 12px;">
                <a href="#artikel" class="uyt-hero-nav-btn active">Artikel UYT</a>
                <a href="#video" class="uyt-hero-nav-btn">Video Kegiatan</a>
                <a href="#kirim-cerita" class="uyt-hero-nav-btn">Kirim Ceritamu</a>
            </div>
        </div>
    </section>

    <!-- ===== Artikel UYT ===== -->
    <section class="section-box mt-0 mb-50 p-20 pt-60" id="artikel" style="background: #ffffff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Artikel &amp; Berita</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp" style="color: #05264e;">Artikel &amp; Berita UYT</h4>
                <p class="mb-25 mt-15 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Cerita dan liputan terbaru dari lapangan gerakan Use Your Talents Indonesia
                </p>

                <!-- Search / Filter bar artikel -->
                <div class="mb-35 d-flex justify-content-center">
                    <div class="input-group" style="max-width: 420px; border: 1.5px solid #e2e8f0; border-radius: 30px; overflow: hidden; background: #f8fafc;">
                        <span class="input-group-text bg-transparent border-0 pe-1"><i class="fa fa-search text-muted"></i></span>
                        <input type="text" id="searchArticleInput" class="form-control border-0 bg-transparent" placeholder="Cari topik atau judul artikel..." style="box-shadow: none; font-size: 14px;" onkeyup="filterArticles()">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pr-15 pl-15" id="articleListContainer">
                @forelse ($articles as $art)
                    <div class="col-lg-4 mb-30 article-item-card">
                        <div class="card-blog-1 bg-white hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <figure class="post-thumb mb-15" style="height: 190px; overflow: hidden; border-radius: 8px; background: linear-gradient(135deg, #05264e 0%, #1a1a2e 100%);">
                                <a href="{{ route('article_detail', $art->slug) }}" target="_blank" style="display: block; width: 100%; height: 100%;">
                                    @if ($art->media && file_exists(public_path($art->media)))
                                        <img alt="{{ $art->title }}" src="{{ asset($art->media) }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                        <div class="d-none align-items-center justify-content-center flex-column text-center p-20" style="height: 100%; background: linear-gradient(135deg, #05264e 0%, #16213e 100%);">
                                            <span style="font-size: 36px; margin-bottom: 8px;">📖</span>
                                            <span style="color: rgba(255,255,255,0.75); font-size: 13px; font-weight: 600;">Cerita &amp; Inspirasi UYT</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center flex-column text-center p-20" style="height: 100%; background: linear-gradient(135deg, #05264e 0%, #16213e 100%);">
                                            <span style="font-size: 36px; margin-bottom: 8px;">📖</span>
                                            <span style="color: rgba(255,255,255,0.75); font-size: 13px; font-weight: 600;">Cerita &amp; Inspirasi UYT</span>
                                        </div>
                                    @endif
                                </a>
                            </figure>
                            <div class="card-block-info text-dark">
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <span><i class="fi-rr-edit mr-5 text-grey-6"></i>{{ date('d F Y', strtotime($art->created_at)) }}</span>
                                </div>
                                <h3 class="post-title mb-15">
                                    <a href="{{ route('article_detail', $art->slug) }}" target="_blank">
                                        {{ \Illuminate\Support\Str::limit($art->title, 50, '...') }}
                                    </a>
                                </h3>
                                <p class="post-excerpt text-muted">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($art->description), 97, '...') !!}
                                </p>
                                <div class="card-2-bottom mt-30">
                                    <div class="keep-reading">
                                        <a href="{{ route('article_detail', $art->slug) }}" target="_blank" class="text-fix"><strong>BACA SELENGKAPNYA</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-40">
                        <div style="font-size: 56px; margin-bottom: 16px;">📰</div>
                        <p class="text-muted">Belum ada artikel yang dipublikasikan. Kembali lagi nanti!</p>
                    </div>
                @endforelse
            </div>
            <div class="paginations d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </section>

    <!-- ===== Galeri Video ===== -->
    <section class="section-box mt-40 mb-40 p-20 pt-35" id="video" style="background: #f8faff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Dokumentasi Video</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Galeri Video Kegiatan</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Dokumentasi video dari workshop, liputan lapangan, dan kesaksian transformasi komunitas
                </p>
            </div>
            <div class="row mb-50">
                @forelse ($videos as $vid)
                    @php
                        $youtubeId = '';
                        if (!empty($vid->url_video)) {
                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $vid->url_video, $match)) {
                                $youtubeId = $match[1];
                            }
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 mb-30 wow animate__animated animate__fadeIn">
                        <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: #000; height: 210px;">
                            @if ($youtubeId)
                                <iframe width="100%" height="210"
                                    src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}"
                                    title="{{ $vid->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    style="border: 0; display: block;">
                                </iframe>
                            @else
                                <div class="d-flex align-items-center justify-content-center flex-column text-center p-20" style="height: 100%; background: linear-gradient(135deg, #05264e 0%, #16213e 100%);">
                                    <span style="font-size: 36px; margin-bottom: 8px;">🎬</span>
                                    <span style="color: rgba(255,255,255,0.75); font-size: 13px; font-weight: 600;">Video Dokumentasi UYT</span>
                                </div>
                            @endif
                        </div>
                        @if ($vid->title)
                            <h6 class="mt-15 text-center text-dark" style="font-size: 14px; font-weight: 600; line-height: 1.4;">{{ $vid->title }}</h6>
                        @endif
                    </div>
                @empty
                    <div class="col-12 text-center py-30">
                        <div style="font-size: 56px; margin-bottom: 16px;">🎥</div>
                        <p class="text-muted">Belum ada video kegiatan yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== Form Kirim Cerita ===== -->
    <section class="section-box mt-40 mb-40 p-20 pt-35" id="kirim-cerita">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Formulir Internal</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Kirim Ceritamu Disini</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Bagikan bagaimana Tuhan memakai talenta dan aset di gereja / komunitas Anda untuk menginspirasi sesama.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="uyt-form-card wow animate__animated animate__fadeIn">
                        <form id="formKirimCerita" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Nama Lengkap *</strong></label>
                                    <input class="form-control" type="text" name="name" placeholder="Contoh: Maria Simanjuntak" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Alamat Email *</strong></label>
                                    <input class="form-control" type="email" name="email" placeholder="Contoh: maria@gmail.com" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Nomor WhatsApp</strong></label>
                                    <input class="form-control" type="text" name="phone" placeholder="Contoh: 081234567890" />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Gereja / Komunitas</strong></label>
                                    <input class="form-control" type="text" name="organization" placeholder="Contoh: GKII Jemaat Kasih" />
                                </div>
                                <div class="col-12 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Judul Cerita Inspiratif *</strong></label>
                                    <input class="form-control" type="text" name="title" placeholder="Contoh: Memulai Kebun Jemaat dari Potensi Sederhana" required />
                                </div>
                                <div class="col-12 mb-20">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Isi Cerita &amp; Pengalaman Anda *</strong></label>
                                    <textarea class="form-control" name="story" rows="6" placeholder="Ceritakan proses awal penemuan talenta, aksi yang dilakukan, dan buah berkat yang dirasakan..." required></textarea>
                                </div>
                                <div class="col-12 mb-30">
                                    <label class="font-sm color-text-mutted mb-10"><strong>Foto Dokumentasi (Opsional)</strong></label>
                                    <input class="form-control" type="file" name="media" accept="image/*" />
                                    <small class="text-muted">Format: JPG, PNG. Maksimal 2 MB</small>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" id="btnSubmitCerita" class="uyt-btn-submit">
                                        Kirim Cerita Saya ✨
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
function filterArticles() {
    var query = $('#searchArticleInput').val().toLowerCase();
    $('.article-item-card').each(function() {
        var text = $(this).text().toLowerCase();
        if (text.indexOf(query) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

$(document).ready(function() {
    $('#formKirimCerita').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var btn = $('#btnSubmitCerita');
        btn.prop('disabled', true).text('Mengirimkan...');
        $.ajax({
            url: "{{ route('uyt_submit_story') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                Swal.fire({ icon: 'success', title: 'Cerita Berhasil Dikirim!', text: res.message, confirmButtonColor: '#fd0249' });
                $('#formKirimCerita')[0].reset();
                btn.prop('disabled', false).text('Kirim Cerita Saya ✨');
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Gagal Mengirim', text: 'Pastikan seluruh isian terisi dengan benar.', confirmButtonColor: '#fd0249' });
                btn.prop('disabled', false).text('Kirim Cerita Saya ✨');
            }
        });
    });
});
</script>
@endsection
