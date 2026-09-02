@extends('layouts.app')

@section('title', 'Pendaftaran Workshop UYT')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Use Your Talents</li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pendaftaran Workshop</a></li>
        </ol>
    </div>

    @if ($message = Session::get('message'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Sukses!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="card-title mb-0">Daftar Pengajuan Workshop & Kemitraan (Internal Form)</h5>
                    <a href="{{ route('admin_uyt_workshops_export') }}" class="btn btn-success btn-sm mt-2 mt-sm-0">
                        <i class="fa fa-file-excel-o me-1"></i> Export Excel / CSV
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="40">No</th>
                                    <th>Kontak Pemohon</th>
                                    <th>Lembaga & Kota</th>
                                    <th>Workshop & Peserta</th>
                                    <th>Rencana Tanggal</th>
                                    <th>Pesan</th>
                                    <th width="140">Status</th>
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($workshops as $index => $ws)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $ws->name }}</strong>
                                            <div class="small text-muted"><i class="fa fa-envelope me-1"></i>{{ $ws->email }}</div>
                                            <div class="small text-muted"><i class="fa fa-phone me-1"></i>{{ $ws->phone }}</div>
                                        </td>
                                        <td>
                                            <strong>{{ $ws->organization_name }}</strong>
                                            <div class="small text-muted">{{ $ws->organization_type ?? '-' }} &bull; {{ $ws->city ?? '-' }}</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $ws->workshop_type }}</span>
                                            @if ($ws->estimated_participants)
                                                <div class="small text-muted mt-1">Est. {{ $ws->estimated_participants }} Peserta</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($ws->preferred_date)
                                                <strong>{{ date('d M Y', strtotime($ws->preferred_date)) }}</strong>
                                            @else
                                                <span class="text-muted small">Fleksibel</span>
                                            @endif
                                        </td>
                                        <td><small class="text-muted">{{ $ws->message ?? '-' }}</small></td>
                                        <td>
                                            <form method="POST" action="{{ route('admin_uyt_workshops_status', $ws->id) }}">
                                                @csrf
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $ws->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="contact_made" {{ $ws->status == 'contact_made' ? 'selected' : '' }}>Sudah Dihubungi</option>
                                                    <option value="approved" {{ $ws->status == 'approved' ? 'selected' : '' }}>Disetujui / Terjadwal</option>
                                                    <option value="rejected" {{ $ws->status == 'rejected' ? 'selected' : '' }}>Ditolak / Batal</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin_uyt_workshops_delete', $ws->id) }}" onsubmit="return confirm('Hapus permohonan workshop ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada pengajuan pendaftaran workshop.</td>
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
