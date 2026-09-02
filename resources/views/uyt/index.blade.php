@extends('uyt.layouts.uyt-app')

@section('title', 'Beranda')

@section('styles')
<style>
    /* ===== UYT Hero Section ===== */
    .uyt-hero {
        background: linear-gradient(135deg, #05264e 0%, #111e38 60%, #1a1a2e 100%);
        padding: 70px 0 60px;
        position: relative;
    }
    .uyt-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: #fff;
        line-height: 1.25;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }
    .uyt-hero h1 span { color: #fd0249; }
    .uyt-hero p { color: rgba(255,255,255,0.8); font-size: 16px; line-height: 1.8; }
    .uyt-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(253,2,73,0.15);
        border: 1px solid rgba(253,2,73,0.4);
        color: #ff6b95;
        font-size: 13px;
        font-weight: 600;
        padding: 6px 16px;
        border-radius: 20px;
        margin-bottom: 22px;
    }
    .uyt-hero-badge::before {
        content: '●';
        font-size: 8px;
        color: #fd0249;
    }
    .uyt-btn-primary {
        background: #fd0249;
        color: #fff !important;
        border: 2px solid #fd0249;
        border-radius: 8px;
        padding: 13px 28px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
    }
    .uyt-btn-primary:hover { background: #c8003a; border-color: #c8003a; }
    .uyt-btn-outline {
        background: rgba(255,255,255,0.08);
        color: #fff !important;
        border: 1.5px solid rgba(255,255,255,0.3);
        border-radius: 8px;
        padding: 13px 28px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
    }
    .uyt-btn-outline:hover { background: rgba(255,255,255,0.18); border-color: #fff; }

    /* ===== Hero Card Side ===== */
    .uyt-hero-card-side {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 36px 30px;
        text-align: center;
        backdrop-filter: blur(10px);
    }
    .uyt-hero-card-side img {
        max-height: 140px;
        margin-bottom: 20px;
    }
    .uyt-hero-card-side h5 {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .uyt-hero-card-side p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* ===== Stats Row ===== */
    .uyt-stat-card {
        text-align: center;
        padding: 24px 16px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        border: 1px solid #f0f0f0;
        height: 100%;
        transition: transform 0.2s ease;
    }
    .uyt-stat-card:hover { transform: translateY(-4px); }
    .uyt-stat-num { font-size: 34px; font-weight: 800; color: #fd0249; line-height: 1; margin-bottom: 6px; }
    .uyt-stat-label { font-size: 13px; color: #555; font-weight: 600; }

    /* ===== Section Label ===== */
    .uyt-label {
        display: inline-block;
        background: #fff0f3;
        color: #fd0249;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 20px;
        margin: 0 auto 12px;
    }
    .mw-650 {
        text-align: center;
    }

    /* ===== Feature Card ===== */
    .uyt-feature-card {
        background: #fff;
        border: 1.5px solid #f0f0f0;
        border-radius: 14px;
        padding: 32px 28px;
        height: 100%;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
    }
    .uyt-feature-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 0;
        background: #fd0249;
        border-radius: 0 0 4px 4px;
        transition: height 0.3s ease;
    }
    .uyt-feature-card:hover { border-color: #fd0249; box-shadow: 0 8px 30px rgba(253,2,73,0.1); }
    .uyt-feature-card:hover::before { height: 100%; }
    .uyt-icon-box {
        width: 56px; height: 56px;
        border-radius: 12px;
        background: #fff0f3;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 20px;
        font-size: 26px;
    }
    .uyt-feature-card h5 { font-size: 18px; font-weight: 700; color: #05264e; margin-bottom: 10px; }
    .uyt-feature-card p { color: #777; font-size: 14px; line-height: 1.7; margin: 0; }

    /* ===== Alkitab Quote ===== */
    .uyt-quote-block {
        background: linear-gradient(135deg, #05264e, #1a1a2e);
        border-radius: 16px;
        padding: 48px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .uyt-quote-block::before {
        content: '\201C';
        position: absolute;
        top: -20px; left: 20px;
        font-size: 160px;
        color: rgba(253,2,73,0.12);
        font-family: Georgia, serif;
        line-height: 1;
        pointer-events: none;
    }
    .uyt-quote-block blockquote {
        font-size: 20px;
        font-style: italic;
        color: rgba(255,255,255,0.9);
        line-height: 1.7;
        margin: 0 0 20px;
        position: relative;
        z-index: 1;
    }
    .uyt-quote-block cite { color: #fd0249; font-weight: 700; font-style: normal; font-size: 14px; }

    /* ===== Resource Card ===== */
    .uyt-resource-card {
        background: #fff;
        border: 1.5px solid #f0f0f0;
        border-radius: 12px;
        padding: 24px;
        height: 100%;
        transition: all 0.2s ease;
        display: flex; flex-direction: column;
    }
    .uyt-resource-card:hover { border-color: #fd0249; box-shadow: 0 6px 24px rgba(253,2,73,0.1); }
    .uyt-resource-type {
        display: inline-block;
        font-size: 11px; font-weight: 700; letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 10px; border-radius: 4px;
        margin-bottom: 12px;
    }
    .uyt-resource-type.pdf { background: #fff0f3; color: #fd0249; }
    .uyt-resource-type.ppt { background: #fff3e0; color: #e65100; }
    .uyt-resource-type.doc { background: #e3f2fd; color: #1565c0; }
    .uyt-dl-btn {
        display: flex; align-items: center; justify-content: space-between;
        border: 1.5px solid #e8e8e8;
        border-radius: 8px;
        padding: 10px 14px;
        margin-top: auto;
        text-decoration: none;
        color: #333;
        font-size: 13px; font-weight: 600;
        transition: all 0.2s;
    }
    .uyt-dl-btn:hover { border-color: #fd0249; color: #fd0249; text-decoration: none; }
    .uyt-dl-btn .dl-badge { background: #333; color: #fff; border-radius: 4px; padding: 2px 8px; font-size: 11px; }
</style>
@endsection

@section('content')

    <!-- ===== Hero Section ===== -->
    <section class="uyt-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 wow animate__animated animate__fadeInLeft">
                    <div class="uyt-hero-badge">Gerakan Pemberdayaan Berbasis Aset</div>
                    <h1>
                        @if (!empty($hero->title))
                            {!! nl2br(e($hero->title)) !!}
                        @else
                            Melihat Apa yang<br>
                            <span>Tuhan Percayakan.</span><br>
                            Menggunakannya Menjadi Berkat.
                        @endif
                    </h1>
                    <p class="mb-35">
                        {{ $hero->subtitle ?? 'Use Your Talents (UYT) adalah gerakan yang membantu individu, gereja, dan komunitas mengenali talenta, relasi, pengalaman, dan aset yang telah Tuhan percayakan untuk melayani serta membawa perubahan nyata.' }}
                    </p>
                    <div class="d-flex flex-wrap align-items-center" style="gap: 16px;">
                        <a href="{{ route('uyt_workshop') }}#form-pendaftaran" class="uyt-btn-primary">Saya Ingin Mengadakan Workshop</a>
                        <a href="{{ route('uyt_cerita_dampak') }}" class="uyt-btn-outline">Lihat Cerita &amp; Dampak</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center mt-40 mt-lg-0 wow animate__animated animate__fadeInRight">
                    <div class="uyt-hero-card-side">
                        <img src="{{ asset('front/imgs/logo_uyt.png') }}" alt="Use Your Talents" />
                        <h5>Use Your Talents Indonesia</h5>
                        <p>Menggali potensi lokal, mewujudkan kemandirian jemaat dan komunitas berakar pada firman Tuhan.</p>
                    </div>
                </div>
            </div>

            <!-- Stats Row -->
            @php
                $statsData = !empty($stats->content) ? json_decode($stats->content, true) : [];
            @endphp
            <div class="row mt-45 wow animate__animated animate__fadeInUp">
                <div class="col-6 col-md-3 mb-20">
                    <div class="uyt-stat-card">
                        <div class="uyt-stat-num">{{ $statsData['stat1_num'] ?? '50+' }}</div>
                        <div class="uyt-stat-label">{{ $statsData['stat1_label'] ?? 'Workshop Diselenggarakan' }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-20">
                    <div class="uyt-stat-card">
                        <div class="uyt-stat-num">{{ $statsData['stat2_num'] ?? '1000+' }}</div>
                        <div class="uyt-stat-label">{{ $statsData['stat2_label'] ?? 'Peserta Terlibat' }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-20">
                    <div class="uyt-stat-card">
                        <div class="uyt-stat-num">{{ $statsData['stat3_num'] ?? '30+' }}</div>
                        <div class="uyt-stat-label">{{ $statsData['stat3_label'] ?? 'Gereja & Komunitas Mitra' }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-20">
                    <div class="uyt-stat-card">
                        <div class="uyt-stat-num">{{ $statsData['stat4_num'] ?? '15+' }}</div>
                        <div class="uyt-stat-label">{{ $statsData['stat4_label'] ?? 'Fasilitator Bersertifikat' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Mengenal UYT ===== -->
    <section class="section-box mt-60 mb-0 p-20 pt-35" id="mengenal">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label">Tentang Gerakan</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">
                    {{ $mengenal->title ?? 'Mengenal Use Your Talents' }}
                </h4>
            </div>
            <div class="row pr-15 pl-15 mt-40">
                <div class="col-lg-4 mb-30">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <div class="uyt-icon-box">🎯</div>
                        <h5>Apa itu UYT?</h5>
                        <p>Gerakan yang mengajak kita melihat potensi yang sudah ada di tangan kita dan mengembangkannya demi kemuliaan Tuhan dan sesama.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="uyt-icon-box">🌱</div>
                        <h5>Pendekatan ABCD</h5>
                        <p>Asset Based Community Development — fokus pada kekuatan &amp; aset lokal yang sudah ada, bukan pada kekurangan yang perlu diisi dari luar.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="uyt-icon-box">🤝</div>
                        <h5>Untuk Siapa?</h5>
                        <p>Individu, jemaat gereja, sinode, yayasan, komunitas, dan sekolah yang ingin bertumbuh mandiri melalui talenta yang Tuhan percayakan.</p>
                    </div>
                </div>
            </div>
            @if (!empty($mengenal->content))
            <div class="row pr-15 pl-15 mt-10">
                <div class="col-12">
                    <div class="uyt-box wow animate__animated animate__fadeIn">
                        <div class="text-muted" style="font-size: 15px; line-height: 1.85;">
                            {!! $mengenal->content !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- ===== Landasan Alkitab ===== -->
    <section class="section-box mt-40 mb-0 p-20 pt-35" id="landasan" style="background: #f8faff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label">Prinsip Firman</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">
                    {{ $landasan->title ?? 'Landasan Alkitab UYT' }}
                </h4>
            </div>
            <div class="row pr-15 pl-15 mt-40">
                <div class="col-lg-8 offset-lg-2">
                    <div class="uyt-quote-block wow animate__animated animate__fadeIn">
                        <blockquote>
                            "Karena itu, gunakanlah karunia yang telah kamu terima untuk melayani seorang akan yang lain, seperti pengurus yang baik dari kasih karunia Allah yang beraneka ragam itu."
                        </blockquote>
                        <cite>1 Petrus 4:10</cite>
                    </div>
                </div>
            </div>
            <div class="row pr-15 pl-15 mt-30">
                <div class="col-lg-4 mb-20">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <div class="uyt-icon-box">📖</div>
                        <h5>Matius 25:14-30</h5>
                        <p>Perumpamaan tentang talenta — Tuhan memberi kepercayaan dan mengharapkan kita menggunakannya secara bertanggung jawab.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-20">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="uyt-icon-box">📖</div>
                        <h5>Keluaran 4:2</h5>
                        <p>"Apa yang ada di tanganmu?" — Tuhan memulai transformasi dari apa yang sudah ada, bukan dari yang tidak ada.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-20">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="uyt-icon-box">📖</div>
                        <h5>1 Petrus 4:10</h5>
                        <p>Setiap orang menerima karunia untuk melayani sesama sebagai pengurus yang baik dari kasih karunia Allah.</p>
                    </div>
                </div>
            </div>
            @if (!empty($landasan->content))
            <div class="row pr-15 pl-15 mt-10">
                <div class="col-12">
                    <div class="uyt-box wow animate__animated animate__fadeIn">
                        <div class="text-muted" style="font-size: 15px; line-height: 1.85;">{!! $landasan->content !!}</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- ===== Cara Kerja UYT ===== -->
    <section class="section-box mt-0 mb-0 p-20 pt-35" id="cara-kerja">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label">Metodologi</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">
                    {{ $cara_kerja->title ?? 'Cara Kerja Use Your Talents' }}
                </h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Empat tahapan sederhana menuju komunitas yang mandiri dan berbuah
                </p>
            </div>
            <div class="row pr-15 pl-15 mt-20">
                @php
                    $steps = [
                        ['no' => '01', 'icon' => '🔍', 'title' => 'Discover', 'desc' => 'Menggali dan memetakan aset, talenta, relasi, serta pengalaman yang sudah dimiliki jemaat.'],
                        ['no' => '02', 'icon' => '💡', 'title' => 'Envision', 'desc' => 'Merumuskan visi bersama tentang masa depan yang diinginkan berdasarkan potensi yang ditemukan.'],
                        ['no' => '03', 'icon' => '🗺️', 'title' => 'Plan & Act', 'desc' => 'Menyusun rencana aksi konkret dan melaksanakan inisiatif mandiri yang berkelanjutan.'],
                        ['no' => '04', 'icon' => '🎉', 'title' => 'Celebrate & Multiply', 'desc' => 'Merayakan kemajuan, mendokumentasikan cerita, dan mereplikasi dampak ke komunitas lain.'],
                    ];
                @endphp
                @foreach ($steps as $step)
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="uyt-feature-card wow animate__animated animate__fadeInUp text-center" data-wow-delay="{{ ($loop->index * 0.1) }}s">
                        <div style="font-size: 36px; margin-bottom: 12px;">{{ $step['icon'] }}</div>
                        <div style="font-size: 40px; font-weight: 900; color: #f0f0f0; line-height: 1; margin-bottom: -8px;">{{ $step['no'] }}</div>
                        <h5 style="color: #fd0249;">{{ $step['title'] }}</h5>
                        <p>{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @if (!empty($cara_kerja->content))
            <div class="row pr-15 pl-15 mt-10">
                <div class="col-12">
                    <div class="uyt-box wow animate__animated animate__fadeIn">
                        <div class="text-muted" style="font-size: 15px; line-height: 1.85;">{!! $cara_kerja->content !!}</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- ===== Resources ===== -->
    <section class="section-box mt-0 mb-40 p-20 pt-35" id="resources" style="background: #f8faff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label">Materi Unduhan</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Resources Dokumen &amp; Presentasi</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Dokumen &amp; materi presentasi untuk mendukung pelaksanaan gerakan UYT di komunitas Anda
                </p>
            </div>
            <div class="row pr-15 pl-15 mt-20">
                @forelse ($resources as $res)
                    <div class="col-lg-6 mb-25">
                        <div class="uyt-resource-card wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <span class="uyt-resource-type {{ strtolower($res->category) == 'pdf' ? 'pdf' : (strtolower($res->category) == 'presentasi' ? 'ppt' : 'doc') }}">
                                {{ strtoupper($res->category) }}
                            </span>
                            <h5 style="font-size: 16px; font-weight: 700; color: #05264e; margin-bottom: 8px;">{{ $res->title }}</h5>
                            @if ($res->description)
                                <p class="text-muted small mb-15" style="line-height: 1.6;">{{ $res->description }}</p>
                            @endif
                            <a href="{{ asset($res->file_path) }}" target="_blank" download class="uyt-dl-btn">
                                <span><i class="fi-rr-download mr-5"></i> Unduh {{ $res->title }}</span>
                                <span class="dl-badge">download</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Materi dokumen dan presentasi sedang dipersiapkan oleh tim kami.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
