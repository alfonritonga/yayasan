@extends('uyt.layouts.uyt-app')

@section('title', 'Resources')

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
    .uyt-resource-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        border: 1.5px solid #e8e8e8;
        border-radius: 10px;
        padding: 16px 20px;
        margin-bottom: 16px;
        transition: all 0.2s ease;
        text-decoration: none;
        color: #05264e;
    }
    .uyt-resource-item:hover {
        border-color: #fd0249;
        box-shadow: 0 4px 20px rgba(253,2,73,0.08);
        transform: translateY(-2px);
        text-decoration: none;
        color: #fd0249;
    }
    .uyt-download-btn {
        background: #05264e;
        color: #fff !important;
        border-radius: 6px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        transition: background 0.2s;
    }
    .uyt-resource-item:hover .uyt-download-btn {
        background: #fd0249;
    }
</style>
@endsection

@section('content')

    <!-- ===== Page Hero ===== -->
    <section class="uyt-page-hero">
        <div class="container text-center">
            <span class="uyt-label">Pusat Pembelajaran &amp; Toolkit</span>
            <h2 class="wow animate__animated animate__fadeInUp">Resources</h2>
            <p class="wow animate__animated animate__fadeInUp" style="max-width: 620px; margin: 0 auto;">
                Kumpulan dokumen panduan, materi presentasi workshop, dan video pembelajaran Use Your Talents untuk memperlengkapi komunitas Anda.
            </p>
        </div>
    </section>

    <!-- ===== 1. Dokumen Unduhan (Sesuai Wireframe Halaman 9) ===== -->
    <section class="section-box mt-50 mb-40 p-20 pt-30" id="dokumen">
        <div class="container">
            <div class="uyt-box wow animate__animated animate__fadeIn">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-25 pb-15 border-bottom">
                    <div>
                        <h4 class="mb-5 font-weight-bold" style="color: #05264e;"><i class="fi-rr-document text-brand mr-8"></i>Dokumen</h4>
                        <p class="text-muted mb-0" style="font-size: 14px;">Materi presentasi, panduan kurikulum, dan formulir kerja UYT.</p>
                    </div>
                    <small style="color: #fd0249; font-style: italic; font-weight: 600;">(Dokumen akan diupload secara berkala di bagian ini)</small>
                </div>

                <div class="row">
                    @forelse ($resources as $res)
                        <div class="col-lg-6 mb-15">
                            <a href="{{ asset($res->file_path) }}" target="_blank" download class="uyt-resource-item">
                                <div class="d-flex align-items-center" style="gap: 12px; overflow: hidden;">
                                    <span style="font-size: 24px; flex-shrink: 0;">📄</span>
                                    <div style="overflow: hidden;">
                                        <h6 class="mb-2 text-truncate" style="font-size: 15px; font-weight: 700;">{{ $res->title }}</h6>
                                        <small class="text-muted">{{ strtoupper($res->category) }} @if($res->description) &bull; {{ \Illuminate\Support\Str::limit($res->description, 45) }} @endif</small>
                                    </div>
                                </div>
                                <span class="uyt-download-btn ms-3">
                                    <i class="fi-rr-download"></i> download
                                </span>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-40">
                            <div style="font-size: 48px; margin-bottom: 12px;">📁</div>
                            <p class="text-muted">Dokumen dan modul sedang dipersiapkan oleh tim kami.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 2. Video Materi (Sesuai Wireframe Halaman 9) ===== -->
    <section class="section-box mt-0 mb-50 p-20 pt-20" id="video-materi">
        <div class="container">
            <div class="uyt-box wow animate__animated animate__fadeIn">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-25 pb-15 border-bottom">
                    <div>
                        <h4 class="mb-5 font-weight-bold" style="color: #05264e;"><i class="fi-rr-video-camera text-brand mr-8"></i>Video Materi</h4>
                        <p class="text-muted mb-0" style="font-size: 14px;">Rekaman sesi pelatihan, penjelasan konsep dasar ABCD, dan studi kasus.</p>
                    </div>
                    <small style="color: #fd0249; font-style: italic; font-weight: 600;">(Video akan diupload secara berkala di bagian ini)</small>
                </div>

                <div class="row">
                    @forelse ($videos as $vid)
                        @php
                            $youtubeId = '';
                            if (!empty($vid->url_video)) {
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $vid->url_video, $match)) {
                                    $youtubeId = $match[1];
                                }
                            }
                        @endphp
                        <div class="col-lg-3 col-md-6 mb-30">
                            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: #000; height: 180px;">
                                @if ($youtubeId)
                                    <iframe width="100%" height="180"
                                        src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}"
                                        title="{{ $vid->title }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen
                                        style="border: 0; display: block;">
                                    </iframe>
                                @else
                                    <div class="d-flex align-items-center justify-content-center flex-column text-center p-20" style="height: 100%; background: linear-gradient(135deg, #05264e 0%, #16213e 100%);">
                                        <span style="font-size: 32px; margin-bottom: 8px;">🎬</span>
                                        <span style="color: rgba(255,255,255,0.75); font-size: 12px; font-weight: 600;">Video Materi UYT</span>
                                    </div>
                                @endif
                            </div>
                            @if ($vid->title)
                                <h6 class="mt-12 text-center text-dark text-truncate" style="font-size: 14px; font-weight: 600;" title="{{ $vid->title }}">{{ $vid->title }}</h6>
                            @endif
                        </div>
                    @empty
                        <div class="col-12 text-center py-40">
                            <div style="font-size: 48px; margin-bottom: 12px;">🎥</div>
                            <p class="text-muted">Video materi sedang dalam proses produksi.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
