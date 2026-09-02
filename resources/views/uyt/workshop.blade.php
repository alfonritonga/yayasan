@extends('uyt.layouts.uyt-app')

@section('title', 'Workshop & Mitra Gerakan UYT')

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
    /* Info box dark */
    .uyt-dark-box {
        background: linear-gradient(135deg, #05264e 0%, #1a1a2e 100%);
        border-radius: 16px;
        padding: 40px;
        color: rgba(255,255,255,0.85);
        font-size: 15px;
        line-height: 1.85;
    }
    .uyt-dark-box h4 { color: #fff; margin-bottom: 16px; }

    /* Workshop Cards */
    .uyt-workshop-card {
        background: #fff;
        border: 2px solid #f0f0f0;
        border-radius: 16px;
        padding: 32px 28px;
        height: 100%;
        transition: all 0.25s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    .uyt-workshop-card:hover { transform: translateY(-6px); box-shadow: 0 16px 50px rgba(0,0,0,0.1); }
    .uyt-workshop-card.featured { border-color: #fd0249; }
    .uyt-workshop-popular {
        position: absolute;
        top: -14px; left: 50%;
        transform: translateX(-50%);
        background: #fd0249;
        color: #fff;
        font-size: 12px; font-weight: 700;
        padding: 5px 18px;
        border-radius: 20px;
        white-space: nowrap;
    }
    .uyt-workshop-icon { font-size: 40px; margin-bottom: 12px; }
    .uyt-workshop-badge {
        display: inline-block;
        background: #fff0f3;
        color: #fd0249;
        font-size: 11px; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase;
        border-radius: 20px;
        padding: 4px 12px;
        margin-bottom: 14px;
    }
    .uyt-workshop-badge.featured { background: #fd0249; color: #fff; }
    .uyt-workshop-title { font-size: 20px; font-weight: 800; color: #05264e; margin-bottom: 8px; }
    .uyt-workshop-duration { font-size: 13px; color: #fd0249; font-weight: 600; margin-bottom: 14px; }
    .uyt-workshop-desc { font-size: 14px; color: #666; line-height: 1.7; margin-bottom: 20px; flex: 1; }
    .uyt-workshop-features { list-style: none; padding: 0; margin: 0 0 24px; }
    .uyt-workshop-features li { font-size: 13px; color: #555; padding: 4px 0; }
    .uyt-workshop-features li::before { content: '✓ '; color: #22863a; font-weight: 700; }
    .uyt-btn-card {
        display: block;
        text-align: center;
        padding: 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s;
        border: 2px solid #fd0249;
    }
    .uyt-btn-card.outline { background: transparent; color: #fd0249; }
    .uyt-btn-card.outline:hover { background: #fd0249; color: #fff; text-decoration: none; }
    .uyt-btn-card.solid { background: #fd0249; color: #fff; }
    .uyt-btn-card.solid:hover { background: #c8003a; text-decoration: none; }

    /* Form */
    .uyt-form-section {
        background: #fff;
        border-radius: 20px;
        padding: 48px 48px;
        box-shadow: 0 12px 60px rgba(0,0,0,0.1);
    }
    .uyt-form-section .form-control {
        border-radius: 8px;
        border: 1.5px solid #e8e8e8;
        padding: 12px 16px;
        transition: border-color 0.2s;
        font-size: 14px;
    }
    .uyt-form-section .form-control:focus { border-color: #fd0249; box-shadow: none; outline: none; }
    .uyt-form-section select.form-control { cursor: pointer; }
    .uyt-form-label { font-size: 13px; font-weight: 700; color: #05264e; margin-bottom: 8px; display: block; }
    .uyt-submit-btn {
        background: linear-gradient(135deg, #fd0249, #c8003a);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 16px 48px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s;
        width: 100%;
        letter-spacing: 0.3px;
    }
    .uyt-submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(253,2,73,0.3); }

    @media (max-width: 768px) {
        .uyt-form-section { padding: 28px 20px; }
    }
</style>
@endsection

@section('content')

    <!-- ===== Page Hero ===== -->
    <section class="uyt-page-hero" style="background: linear-gradient(135deg, #05264e 0%, #1a1a2e 100%);">
        <div class="container text-center">
            <span class="uyt-label">Kemitraan &amp; Pelatihan</span>
            <h2 class="wow animate__animated animate__fadeInUp">Jadilah Mitra Gerakan UYT</h2>
            <p class="wow animate__animated animate__fadeInUp" style="max-width: 600px; margin: 0 auto;">
                Bergabung bersama sinode, gereja lokal, sekolah, dan yayasan dalam memperlengkapi generasi yang mandiri dan berbuah melalui Use Your Talents.
            </p>
        </div>
    </section>

    <!-- ===== Apa itu Mitra ===== -->
    <section class="section-box mt-50 mb-40 p-20 pt-50" id="apa-itu-mitra" style="background: #f8faff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <span class="uyt-label-dark">Kemitraan Strategis</span>
                    <h4 class="wow animate__animated animate__fadeInUp" style="text-align: left;">
                        {{ $mitraInfo->title ?? 'Apa itu Mitra Gerakan UYT?' }}
                    </h4>
                    <div class="text-muted wow animate__animated animate__fadeIn" style="font-size: 15px; line-height: 1.85;">
                        {!! $mitraInfo->content ?? '<p>Mitra Gerakan UYT adalah gereja, sinode, yayasan, sekolah, atau komunitas yang berkomitmen menerapkan prinsip Use Your Talents secara terstruktur dalam pelayanan mereka dan menjadi pusat gerakan pemberdayaan di wilayah masing-masing.</p>' !!}
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="uyt-dark-box wow animate__animated animate__fadeIn">
                        <h4>Manfaat Menjadi Mitra Gerakan</h4>
                        <ul style="padding-left: 20px; margin: 0;">
                            <li style="margin-bottom: 10px;">🎓 Akses pelatihan fasilitator bersertifikat UYT</li>
                            <li style="margin-bottom: 10px;">📦 Materi &amp; toolkit workshop siap pakai</li>
                            <li style="margin-bottom: 10px;">🤝 Pendampingan dari tim UYT Indonesia</li>
                            <li style="margin-bottom: 10px;">🌐 Tergabung dalam jaringan gereja &amp; komunitas UYT</li>
                            <li>📣 Kisah dampak Anda dibagikan kepada komunitas lebih luas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Jenis Workshop ===== -->
    <section class="section-box mt-0 mb-0 p-20 pt-40" id="jenis-workshop">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Pilihan Program</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Jenis Pilihan Workshop UYT</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Pilih paket workshop yang paling sesuai dengan kebutuhan jemaat dan komunitas Anda
                </p>
            </div>
        </div>
        @php
            $packagesData = !empty($workshopPackages->content) ? json_decode($workshopPackages->content, true) : [];
            $p1Features = !empty($packagesData['p1_features']) ? explode("\n", str_replace("\r", "", $packagesData['p1_features'])) : ['Landasan Alkitab UYT', 'Pengenalan pendekatan ABCD', 'Sesi refleksi personal', 'Cocok untuk ibadah umum / retreat'];
            $p2Features = !empty($packagesData['p2_features']) ? explode("\n", str_replace("\r", "", $packagesData['p2_features'])) : ['Pemetaan aset 5 jenis', 'Focus Group Discussion', 'Penyusunan rencana aksi', 'Sesi lapangan & studi kasus', 'Dokumentasi cerita dampak'];
            $p3Features = !empty($packagesData['p3_features']) ? explode("\n", str_replace("\r", "", $packagesData['p3_features'])) : ['Semua modul Community Action', 'Teknik fasilitasi & coaching', 'Praktik lapangan terpandu', 'Sertifikasi resmi UYT Indonesia'];
        @endphp
        <div class="container">
            <div class="row pr-15 pl-15">

                <!-- Paket 1 -->
                <div class="col-lg-4 mb-30">
                    <div class="uyt-workshop-card wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <div class="uyt-workshop-icon">📖</div>
                        <span class="uyt-workshop-badge">{{ $packagesData['p1_badge'] ?? 'Tingkat Pengenalan' }}</span>
                        <div class="uyt-workshop-title">{{ $packagesData['p1_title'] ?? 'Basic UYT Awareness' }}</div>
                        <div class="uyt-workshop-duration">⏱️ {{ $packagesData['p1_duration'] ?? 'Durasi: 1 Hari (4–6 Jam)' }}</div>
                        <p class="uyt-workshop-desc">
                            {{ $packagesData['p1_desc'] ?? 'Sosialisasi dan pemahaman landasan Alkitab tentang penatalayanan talenta. Mengubah pola pikir dari kekurangan menjadi kelimpahan potensi jemaat.' }}
                        </p>
                        <ul class="uyt-workshop-features">
                            @foreach ($p1Features as $f)
                                @if (trim($f) != '')
                                    <li>{{ trim($f) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="#form-pendaftaran" onclick="selectWorkshopPackage('Basic UYT Awareness (1 Hari)')" class="uyt-btn-card outline">Pilih Workshop Ini</a>
                    </div>
                </div>

                <!-- Paket 2 -->
                <div class="col-lg-4 mb-30">
                    <div class="uyt-workshop-card featured wow animate__animated animate__fadeInUp" data-wow-delay=".1s" style="margin-top: 14px;">
                        <div class="uyt-workshop-popular">⭐ Paling Populer</div>
                        <div class="uyt-workshop-icon">🌱</div>
                        <span class="uyt-workshop-badge featured">{{ $packagesData['p2_badge'] ?? 'Community Action' }}</span>
                        <div class="uyt-workshop-title">{{ $packagesData['p2_title'] ?? 'Community Action Workshop' }}</div>
                        <div class="uyt-workshop-duration">⏱️ {{ $packagesData['p2_duration'] ?? 'Durasi: 2–3 Hari Intensif' }}</div>
                        <p class="uyt-workshop-desc">
                            {{ $packagesData['p2_desc'] ?? 'Pelatihan pemetaan aset nyata jemaat, perumusan inisiatif kelompok, studi kasus lapangan, dan penyusunan rencana aksi mandiri yang konkret.' }}
                        </p>
                        <ul class="uyt-workshop-features">
                            @foreach ($p2Features as $f)
                                @if (trim($f) != '')
                                    <li>{{ trim($f) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="#form-pendaftaran" onclick="selectWorkshopPackage('Community Action Workshop (2-3 Hari)')" class="uyt-btn-card solid">Pilih Workshop Ini</a>
                    </div>
                </div>

                <!-- Paket 3 -->
                <div class="col-lg-4 mb-30">
                    <div class="uyt-workshop-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="uyt-workshop-icon">🎓</div>
                        <span class="uyt-workshop-badge">{{ $packagesData['p3_badge'] ?? 'Pelatihan Fasilitator' }}</span>
                        <div class="uyt-workshop-title">{{ $packagesData['p3_title'] ?? 'Training of Facilitators (ToF)' }}</div>
                        <div class="uyt-workshop-duration">⏱️ {{ $packagesData['p3_duration'] ?? 'Durasi: 4–5 Hari' }}</div>
                        <p class="uyt-workshop-desc">
                            {{ $packagesData['p3_desc'] ?? 'Mencetak fasilitator mandiri bersertifikat yang mampu melatih dan mereplikasi gerakan UYT di berbagai cabang gereja dan wilayah.' }}
                        </p>
                        <ul class="uyt-workshop-features">
                            @foreach ($p3Features as $f)
                                @if (trim($f) != '')
                                    <li>{{ trim($f) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="#form-pendaftaran" onclick="selectWorkshopPackage('Training of Facilitators (ToF)')" class="uyt-btn-card outline">Pilih Workshop Ini</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== Form Pendaftaran ===== -->
    <section class="section-box mt-40 mb-40 p-20 pt-35" id="form-pendaftaran" style="background: #f8faff;">
        <div class="container">
            <div class="mw-650">
                <span class="uyt-label-dark">Formulir Mandiri</span>
                <h4 class="text-center wow animate__animated animate__fadeInUp">Form Pendaftaran Workshop &amp; Kemitraan</h4>
                <p class="mb-30 mt-20 text-muted text-center visimisi wow animate__animated animate__fadeInUp">
                    Lengkapi data berikut dan tim Use Your Talents Indonesia akan menghubungi Anda dalam 1–3 hari kerja.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="uyt-form-section wow animate__animated animate__fadeIn">

                        <form id="formPendaftaranWorkshop">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Nama Penanggung Jawab *</label>
                                    <input class="form-control" type="text" name="name" placeholder="Contoh: Pdt. Johanes Pratama" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Email Aktif *</label>
                                    <input class="form-control" type="email" name="email" placeholder="Contoh: johanes@gereja.org" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Nomor WhatsApp / Telepon *</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Contoh: 081234567890" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Nama Gereja / Lembaga *</label>
                                    <input class="form-control" type="text" name="organization_name" placeholder="Contoh: GKI Harapan Bangsa" required />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Kategori Lembaga</label>
                                    <select class="form-control" name="organization_type">
                                        <option value="Gereja / Sinode">Gereja / Sinode</option>
                                        <option value="Yayasan / Lembaga Sosial">Yayasan / Lembaga Sosial</option>
                                        <option value="Sekolah / Kampus">Sekolah / Kampus</option>
                                        <option value="Komunitas Pemuda">Komunitas Pemuda</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Kota / Provinsi</label>
                                    <input class="form-control" type="text" name="city" placeholder="Contoh: Medan, Sumatera Utara" />
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label class="uyt-form-label">Pilihan Jenis Workshop *</label>
                                    <select class="form-control" name="workshop_type" required>
                                        <option value="Basic UYT Awareness (1 Hari)">Basic UYT Awareness (1 Hari)</option>
                                        <option value="Community Action Workshop (2-3 Hari)">Community Action Workshop (2–3 Hari)</option>
                                        <option value="Training of Facilitators (ToF)">Training of Facilitators (ToF)</option>
                                        <option value="Kemitraan Jangka Panjang">Kemitraan Jangka Panjang</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-20">
                                    <label class="uyt-form-label">Estimasi Peserta</label>
                                    <input class="form-control" type="number" name="estimated_participants" placeholder="Contoh: 30" />
                                </div>
                                <div class="col-md-3 mb-20">
                                    <label class="uyt-form-label">Rencana Tanggal</label>
                                    <input class="form-control" type="date" name="preferred_date" />
                                </div>
                                <div class="col-12 mb-30">
                                    <label class="uyt-form-label">Pesan / Harapan untuk Workshop Ini</label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Tuliskan latar belakang atau harapan dampak yang ingin dicapai melalui workshop ini..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="btnSubmitWorkshop" class="uyt-submit-btn">
                                        🚀 Kirim Pendaftaran Workshop
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
function selectWorkshopPackage(packageName) {
    var select = $('select[name="workshop_type"]');
    select.val(packageName);
    // highlight animasi sesaat pada select input
    select.addClass('border-primary').css('border-color', '#fd0249');
    setTimeout(function() {
        $('input[name="organization_name"]').focus();
    }, 600);
}

$(document).ready(function() {
    $('#formPendaftaranWorkshop').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var btn = $('#btnSubmitWorkshop');
        btn.prop('disabled', true).text('⏳ Memproses...');
        $.ajax({
            url: "{{ route('uyt_submit_workshop') }}",
            type: "POST",
            data: formData,
            success: function(res) {
                Swal.fire({ icon: 'success', title: 'Pendaftaran Terkirim!', text: res.message, confirmButtonColor: '#fd0249' });
                $('#formPendaftaranWorkshop')[0].reset();
                btn.prop('disabled', false).text('🚀 Kirim Pendaftaran Workshop');
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Gagal Mengirim', text: 'Silakan periksa kembali data yang Anda masukkan.', confirmButtonColor: '#fd0249' });
                btn.prop('disabled', false).text('🚀 Kirim Pendaftaran Workshop');
            }
        });
    });
});
</script>
@endsection
