@extends('layouts.app')

@section('title', 'Kelola Konten Use Your Talents')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Use Your Talents</li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelola Konten UYT</a></li>
        </ol>
    </div>

    @if ($message = Session::get('message'))
        <div class="alert alert-primary alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
            <strong>Sukses!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    @if ($message = Session::get('error_message'))
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Konten Halaman UYT (CMS)</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_uyt_content_update') }}">
                        @csrf
                        
                        <!-- 1. Hero Section & Stats -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-star-1 me-2"></i>1. Hero Banner & Statistik Utama</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Banner</label>
                                <input type="text" name="hero[title]" class="form-control" value="{{ $contents['hero']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Sub-Judul / Tagline</label>
                                <textarea name="hero[subtitle]" class="form-control" rows="3">{{ $contents['hero']->subtitle ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">URL Video Embed YouTube (Pengenalan)</label>
                                <input type="text" name="hero[video_url]" class="form-control" value="{{ $contents['hero']->video_url ?? '' }}" placeholder="https://www.youtube.com/embed/..." />
                            </div>

                            @php
                                $statsData = !empty($contents['stats']->content) ? json_decode($contents['stats']->content, true) : [];
                            @endphp
                            <hr class="my-4">
                            <h6 class="font-weight-bold text-dark mb-3"><i class="flaticon-381-trending me-2"></i>Statistik Dampak (Stats Counter)</h6>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label font-weight-bold">Statistik 1 (Nilai & Label)</label>
                                    <input type="text" name="stats[stat1_num]" class="form-control mb-1" value="{{ $statsData['stat1_num'] ?? '50+' }}" placeholder="50+" />
                                    <input type="text" name="stats[stat1_label]" class="form-control" value="{{ $statsData['stat1_label'] ?? 'Workshop Diselenggarakan' }}" placeholder="Workshop Diselenggarakan" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label font-weight-bold">Statistik 2 (Nilai & Label)</label>
                                    <input type="text" name="stats[stat2_num]" class="form-control mb-1" value="{{ $statsData['stat2_num'] ?? '1000+' }}" placeholder="1000+" />
                                    <input type="text" name="stats[stat2_label]" class="form-control" value="{{ $statsData['stat2_label'] ?? 'Peserta Terlibat' }}" placeholder="Peserta Terlibat" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label font-weight-bold">Statistik 3 (Nilai & Label)</label>
                                    <input type="text" name="stats[stat3_num]" class="form-control mb-1" value="{{ $statsData['stat3_num'] ?? '30+' }}" placeholder="30+" />
                                    <input type="text" name="stats[stat3_label]" class="form-control" value="{{ $statsData['stat3_label'] ?? 'Gereja & Komunitas Mitra' }}" placeholder="Gereja & Komunitas Mitra" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label font-weight-bold">Statistik 4 (Nilai & Label)</label>
                                    <input type="text" name="stats[stat4_num]" class="form-control mb-1" value="{{ $statsData['stat4_num'] ?? '15+' }}" placeholder="15+" />
                                    <input type="text" name="stats[stat4_label]" class="form-control" value="{{ $statsData['stat4_label'] ?? 'Fasilitator Bersertifikat' }}" placeholder="Fasilitator Bersertifikat" />
                                </div>
                            </div>
                        </div>

                        <!-- 2. Mengenal UYT -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-050-info me-2"></i>2. Mengenal Use Your Talents</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Bagian</label>
                                <input type="text" name="mengenal_uyt[title]" class="form-control" value="{{ $contents['mengenal_uyt']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Isi Konten</label>
                                <textarea id="editor_mengenal" name="mengenal_uyt[content]" class="form-control" rows="6">{{ $contents['mengenal_uyt']->content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- 3. Landasan Alkitab -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-notepad me-2"></i>3. Landasan Alkitab UYT</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Bagian</label>
                                <input type="text" name="landasan_alkitab[title]" class="form-control" value="{{ $contents['landasan_alkitab']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Isi Konten & Ayat Alkitab</label>
                                <textarea id="editor_landasan" name="landasan_alkitab[content]" class="form-control" rows="6">{{ $contents['landasan_alkitab']->content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- 4. Cara Kerja UYT -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-settings me-2"></i>4. Cara Kerja UYT</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Bagian</label>
                                <input type="text" name="cara_kerja[title]" class="form-control" value="{{ $contents['cara_kerja']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Isi Langkah Metodologi</label>
                                <textarea id="editor_cara_kerja" name="cara_kerja[content]" class="form-control" rows="6">{{ $contents['cara_kerja']->content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- 5. Fasilitator Info -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-user-9 me-2"></i>5. Penjelasan Fasilitator UYT</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Bagian</label>
                                <input type="text" name="fasilitator_info[title]" class="form-control" value="{{ $contents['fasilitator_info']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Isi Penjelasan Fasilitator</label>
                                <textarea id="editor_fasilitator" name="fasilitator_info[content]" class="form-control" rows="6">{{ $contents['fasilitator_info']->content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- 6. Mitra & Workshop Info -->
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-network me-2"></i>6. Informasi Kemitraan & Workshop</h5>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Judul Bagian</label>
                                <input type="text" name="mitra_workshop[title]" class="form-control" value="{{ $contents['mitra_workshop']->title ?? '' }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Isi Penjelasan Mitra Gerakan</label>
                                <textarea id="editor_mitra" name="mitra_workshop[content]" class="form-control" rows="6">{{ $contents['mitra_workshop']->content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- 7. Pilihan Paket Workshop UYT -->
                        @php
                            $packagesData = !empty($contents['workshop_packages']->content) ? json_decode($contents['workshop_packages']->content, true) : [];
                        @endphp
                        <div class="p-4 mb-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary font-weight-bold mb-3"><i class="flaticon-381-layer-1 me-2"></i>7. Paket Pilihan Workshop UYT</h5>
                            <p class="text-muted mb-4" style="font-size: 13px;">Kelola detail 3 kartu pilihan program workshop yang tampil pada halaman Workshop & Kemitraan.</p>

                            <!-- Paket 1 -->
                            <div class="p-3 mb-3 border rounded" style="background: #fafafa;">
                                <h6 class="font-weight-bold text-dark mb-3"><span class="badge badge-primary me-2">1</span> Paket 1: Basic Awareness</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Badge Label</label>
                                        <input type="text" name="workshop_packages[p1_badge]" class="form-control" value="{{ $packagesData['p1_badge'] ?? 'Tingkat Pengenalan' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Nama Paket</label>
                                        <input type="text" name="workshop_packages[p1_title]" class="form-control" value="{{ $packagesData['p1_title'] ?? 'Basic UYT Awareness' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Durasi</label>
                                        <input type="text" name="workshop_packages[p1_duration]" class="form-control" value="{{ $packagesData['p1_duration'] ?? 'Durasi: 1 Hari (4–6 Jam)' }}" />
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label font-weight-bold">Deskripsi Ringkas</label>
                                        <textarea name="workshop_packages[p1_desc]" class="form-control" rows="2">{{ $packagesData['p1_desc'] ?? 'Sosialisasi dan pemahaman landasan Alkitab tentang penatalayanan talenta. Mengubah pola pikir dari kekurangan menjadi kelimpahan potensi jemaat.' }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label font-weight-bold">Daftar Fitur / Poin (Satu per baris)</label>
                                        <textarea name="workshop_packages[p1_features]" class="form-control" rows="4">{{ $packagesData['p1_features'] ?? "Landasan Alkitab UYT\nPengenalan pendekatan ABCD\nSesi refleksi personal\nCocok untuk ibadah umum / retreat" }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Paket 2 -->
                            <div class="p-3 mb-3 border rounded border-danger" style="background: #fff9fa;">
                                <h6 class="font-weight-bold text-danger mb-3"><span class="badge badge-danger me-2">2</span> Paket 2: Community Action (Paling Populer)</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Badge Label</label>
                                        <input type="text" name="workshop_packages[p2_badge]" class="form-control" value="{{ $packagesData['p2_badge'] ?? 'Community Action' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Nama Paket</label>
                                        <input type="text" name="workshop_packages[p2_title]" class="form-control" value="{{ $packagesData['p2_title'] ?? 'Community Action Workshop' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Durasi</label>
                                        <input type="text" name="workshop_packages[p2_duration]" class="form-control" value="{{ $packagesData['p2_duration'] ?? 'Durasi: 2–3 Hari Intensif' }}" />
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label font-weight-bold">Deskripsi Ringkas</label>
                                        <textarea name="workshop_packages[p2_desc]" class="form-control" rows="2">{{ $packagesData['p2_desc'] ?? 'Pelatihan pemetaan aset nyata jemaat, perumusan inisiatif kelompok, studi kasus lapangan, dan penyusunan rencana aksi mandiri yang konkret.' }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label font-weight-bold">Daftar Fitur / Poin (Satu per baris)</label>
                                        <textarea name="workshop_packages[p2_features]" class="form-control" rows="5">{{ $packagesData['p2_features'] ?? "Pemetaan aset 5 jenis\nFocus Group Discussion\nPenyusunan rencana aksi\nSesi lapangan & studi kasus\nDokumentasi cerita dampak" }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Paket 3 -->
                            <div class="p-3 mb-2 border rounded" style="background: #fafafa;">
                                <h6 class="font-weight-bold text-dark mb-3"><span class="badge badge-primary me-2">3</span> Paket 3: Training of Facilitators (ToF)</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Badge Label</label>
                                        <input type="text" name="workshop_packages[p3_badge]" class="form-control" value="{{ $packagesData['p3_badge'] ?? 'Pelatihan Fasilitator' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Nama Paket</label>
                                        <input type="text" name="workshop_packages[p3_title]" class="form-control" value="{{ $packagesData['p3_title'] ?? 'Training of Facilitators (ToF)' }}" />
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label font-weight-bold">Durasi</label>
                                        <input type="text" name="workshop_packages[p3_duration]" class="form-control" value="{{ $packagesData['p3_duration'] ?? 'Durasi: 4–5 Hari' }}" />
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label font-weight-bold">Deskripsi Ringkas</label>
                                        <textarea name="workshop_packages[p3_desc]" class="form-control" rows="2">{{ $packagesData['p3_desc'] ?? 'Mencetak fasilitator mandiri bersertifikat yang mampu melatih dan mereplikasi gerakan UYT di berbagai cabang gereja dan wilayah.' }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label font-weight-bold">Daftar Fitur / Poin (Satu per baris)</label>
                                        <textarea name="workshop_packages[p3_features]" class="form-control" rows="4">{{ $packagesData['p3_features'] ?? "Semua modul Community Action\nTeknik fasilitasi & coaching\nPraktik lapangan terpandu\nSertifikasi resmi UYT Indonesia" }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-5"><i class="fa fa-save me-2"></i>Simpan Perubahan Konten</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editors = [
            '#editor_mengenal',
            '#editor_landasan',
            '#editor_cara_kerja',
            '#editor_fasilitator',
            '#editor_mitra'
        ];

        editors.forEach(function(selector) {
            const el = document.querySelector(selector);
            if (el && typeof ClassicEditor !== 'undefined') {
                ClassicEditor.create(el, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
                }).catch(function(error) {
                    console.error(error);
                });
            } else if (el && typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace(el.id);
            }
        });
    });
</script>
@endsection
