@extends('layouts.app')

@section('title', 'Kelola Fasilitator UYT')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Use Your Talents</li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fasilitator UYT</a></li>
        </ol>
    </div>

    @if ($message = Session::get('message'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Sukses!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Form Tambah Fasilitator -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Fasilitator / Trainer</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_uyt_facilitators_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Pdt. Andreas Wicaksono, M.Th" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Peran / Spesialisasi</label>
                            <input type="text" name="role" class="form-control" placeholder="Contoh: Master Trainer UYT" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Lokasi / Wilayah</label>
                            <input type="text" name="location" class="form-control" placeholder="Contoh: Jakarta" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Foto Fasilitator</label>
                            <input type="file" name="photo" class="form-control" accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Testimoni / Kesaksian Pelayanan</label>
                            <textarea name="testimony" class="form-control" rows="4" placeholder="Cerita atau kutipan pengalaman fasilitator..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus me-2"></i>Simpan Fasilitator</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Fasilitator -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Fasilitator & Trainer Terdaftar</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">Foto</th>
                                    <th>Nama & Peran</th>
                                    <th>Lokasi</th>
                                    <th>Testimoni</th>
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($facilitators as $fac)
                                    <tr>
                                        <td class="text-center">
                                            @if ($fac->photo)
                                                <img src="{{ asset($fac->photo) }}" class="rounded-circle" width="45" height="45" style="object-fit: cover;" />
                                            @else
                                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto" style="width: 45px; height: 45px;">
                                                    <i class="fa fa-user text-secondary"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $fac->name }}</strong>
                                            <div class="small text-muted">{{ $fac->role ?? '-' }}</div>
                                        </td>
                                        <td>{{ $fac->location ?? '-' }}</td>
                                        <td><small class="text-muted font-italic">"{{ Str::limit($fac->testimony, 100) }}"</small></td>
                                        <td>
                                            <form method="POST" action="{{ route('admin_uyt_facilitators_delete', $fac->id) }}" onsubmit="return confirm('Hapus fasilitator ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data fasilitator.</td>
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
