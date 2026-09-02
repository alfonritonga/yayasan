@extends('layouts.app')

@section('title', 'Kelola Resources UYT')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Use Your Talents</li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Resources / Download</a></li>
        </ol>
    </div>

    @if ($message = Session::get('message'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Sukses!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Form Tambah Resource -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Dokumen / Presentasi</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_uyt_resources_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Judul Dokumen <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Modul Pelatihan UYT 2026" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Kategori</label>
                            <select name="category" class="form-select">
                                <option value="dokumen">Dokumen (PDF/DOC)</option>
                                <option value="presentasi">Presentasi (PPT/PPTX)</option>
                                <option value="panduan">Buku Panduan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Upload File (PDF/PPT/DOC/ZIP)</label>
                            <input type="file" name="file" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Keterangan Singkat</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi dokumen..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus me-2"></i>Tambah Resource</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Resources -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Dokumen & Materi Download</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Judul Dokumen</th>
                                    <th>Kategori</th>
                                    <th>Link File</th>
                                    <th width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($resources as $index => $res)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $res->title }}</strong>
                                            @if ($res->description)
                                                <div class="small text-muted">{{ $res->description }}</div>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-secondary text-uppercase">{{ $res->category }}</span></td>
                                        <td>
                                            <a href="{{ asset($res->file_path) }}" target="_blank" class="btn btn-xs btn-outline-info">
                                                <i class="fa fa-download me-1"></i> Unduh
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin_uyt_resources_delete', $res->id) }}" onsubmit="return confirm('Hapus dokumen ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada dokumen resources.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
