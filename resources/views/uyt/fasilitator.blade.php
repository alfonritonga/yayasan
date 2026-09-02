@extends('uyt.layouts.uyt-app')

@section('title', 'Fasilitator UYT')

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
    /* Fasilitator card */
    .uyt-fac-card {
        background: #fff;
        border: 1.5px solid #f0f0f0;
        border-radius: 16px;
        padding: 32px 24px;
        text-align: center;
        height: 100%;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
    }
    .uyt-fac-card:hover { border-color: #fd0249; box-shadow: 0 12px 40px rgba(253,2,73,0.12); transform: translateY(-4px); }
    .uyt-fac-avatar {
        width: 80px; height: 80px;
        border-radius: 50%;
        border: 3px solid #fff0f3;
        object-fit: cover;
        margin: 0 auto 16px;
        display: block;
    }
    .uyt-fac-initials {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #fd0249, #ff6b95);
        color: #fff;
        font-size: 24px; font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 16px;
    }
    .uyt-fac-name { font-size: 17px; font-weight: 700; color: #05264e; margin-bottom: 4px; }
    .uyt-fac-role { font-size: 13px; color: #fd0249; font-weight: 600; margin-bottom: 6px; }
    .uyt-fac-loc { font-size: 12px; color: #999; margin-bottom: 14px; }
    .uyt-fac-quote { font-size: 14px; color: #666; font-style: italic; line-height: 1.6; }
    .uyt-cert-badge {
        display: inline-block;
        background: #f0fff4;
        color: #22863a;
        font-size: 11px; font-weight: 700;
        border: 1px solid #c6e6d0;
        border-radius: 20px;
        padding: 4px 12px;
        margin-top: 14px;
    }
    /* Info box */
    .uyt-info-box {
        background: linear-gradient(135deg, #05264e 0%, #1a1a2e 100%);
        border-radius: 16px;
        padding: 40px;
        color: rgba(255,255,255,0.85);
        font-size: 15px;
        line-height: 1.85;
    }
    .uyt-info-box h4 { color: #fff; margin-bottom: 16px; }
    /* CTA Section */
    .uyt-cta-inline {
        background: linear-gradient(135deg, #fd0249 0%, #c8003a 100%);
        border-radius: 16px;
        padding: 48px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .uyt-cta-inline::before {
        content: '✦';
        position: absolute;
        top: 20px; right: 30px;
        font-size: 60px;
        color: rgba(255,255,255,0.08);
        pointer-events: none;
    }
    .uyt-cta-inline h4 { color: #fff; font-size: 28px; font-weight: 800; margin-bottom: 12px; }
    .uyt-cta-inline p { color: rgba(255,255,255,0.85); font-size: 15px; margin-bottom: 24px; }
    .uyt-btn-white {
        background: #fff; color: #fd0249;
        border: none; border-radius: 8px;
        padding: 14px 36px; font-weight: 700;
        font-size: 15px; text-decoration: none;
        display: inline-block;
        transition: all 0.2s ease;
    }
    .uyt-btn-white:hover { background: #fff0f3; color: #fd0249; text-decoration: none; }
</style>
@endsection

@section('content')

    <!-- ===== Page Hero ===== -->
    <section class="uyt-page-hero">
        <div class="container text-center">
            <span class="uyt-label">Katalisator Gerakan</span>
            <h2 class="wow animate__animated animate__fadeInUp">Fasilitator Use Your Talents</h2>
            <p class="wow animate__animated animate__fadeInUp" style="max-width: 580px; margin: 0 auto;">
                Pelayan, pelatih, dan penggerak yang mendampingi jemaat serta masyarakat menggali potensi yang telah Tuhan percayakan.
            </p>
        </div>
    </section>

    <!-- ===== Info Fasilitator ===== -->
    <section class="section-box mt-50 mb-40 p-20 pt-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <span class="uyt-label-dark">Peran &amp; Panggilan</span>
                    <h4 class="wow animate__animated animate__fadeInUp" style="text-align: left;">
                        {{ $info->title ?? 'Mengenal Fasilitator UYT' }}
                    </h4>
                    <div class="text-muted wow animate__animated animate__fadeIn" style="font-size: 15px; line-height: 1.85;">
                        {!! $info->content ?? '<p>Fasilitator UYT adalah individu yang dilatih secara khusus untuk memandu proses penemuan talenta dan aset lokal serta merancang program aksi nyata mandiri yang berkelanjutan di gereja dan komunitas mereka.</p>' !!}
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="uyt-info-box wow animate__animated animate__fadeIn">
                        <h4>Apa yang Dikerjakan Fasilitator?</h4>
                        <ul style="padding-left: 20px; margin: 0;">
                            <li style="margin-bottom: 10px;">🎯 Memimpin sesi Discovery &amp; Asset Mapping bersama jemaat</li>
                            <li style="margin-bottom: 10px;">💡 Memandu proses Envisioning komunitas mandiri</li>
                            <li style="margin-bottom: 10px;">🗺️ Mendampingi penyusunan rencana aksi nyata</li>
                            <li style="margin-bottom: 10px;">📝 Mendokumentasikan cerita dampak &amp; kemajuan</li>
                            <li>🔁 Mereplikasi gerakan ke gereja &amp; komunitas lain</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Testimoni Trainer/Fasilitator ===== -->
    <section class="section-box mt-40 mb-40 p-20 pt-35" id="fasilitator" style="background: #f8faff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Kesaksian Pelayanan</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Testimoni Trainer &amp; Fasilitator</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Bagian ini dikelola dan diperbarui secara berkala oleh Admin UYT
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row pr-15 pl-15">
                @forelse ($facilitators as $fac)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="uyt-fac-card wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            @if ($fac->photo)
                                <img src="{{ asset($fac->photo) }}" class="uyt-fac-avatar" alt="{{ $fac->name }}" />
                            @else
                                <div class="uyt-fac-initials">{{ strtoupper(substr($fac->name, 0, 2)) }}</div>
                            @endif
                            <div class="uyt-fac-name">{{ $fac->name }}</div>
                            <div class="uyt-fac-role">{{ $fac->role ?? 'Fasilitator UYT' }}</div>
                            @if ($fac->location)
                                <div class="uyt-fac-loc"><i class="fi-rr-marker mr-4"></i>{{ $fac->location }}</div>
                            @endif
                            <p class="uyt-fac-quote">"{{ $fac->testimony }}"</p>
                            <span class="uyt-cert-badge">✓ Certified Trainer</span>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-40">
                        <div style="font-size: 56px; margin-bottom: 16px;">👥</div>
                        <p class="text-muted">Daftar testimoni fasilitator sedang diperbarui oleh tim kami.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== CTA Bergabung ===== -->
    <section class="section-box mt-0 mb-40 p-20 pt-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="uyt-cta-inline wow animate__animated animate__fadeIn">
                        <h4>Tertarik Menjadi Bagian dari Gerakan Ini?</h4>
                        <p>Daftarkan diri atau utusan gereja/komunitas Anda untuk mengikuti Training of Facilitators (ToF) UYT — program pelatihan bersertifikat yang akan memperlengkapi Anda menjadi katalisator perubahan.</p>
                        <a href="{{ route('uyt_workshop') }}#form-pendaftaran" class="uyt-btn-white">
                            🎓 Daftar Pelatihan Fasilitator Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
