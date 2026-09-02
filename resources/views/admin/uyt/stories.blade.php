@extends('layouts.app')

@section('title', 'Kelola Cerita Masuk UYT')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Use Your Talents</li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cerita Masuk</a></li>
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
                    <h5 class="card-title mb-0">Daftar Kiriman Cerita Komunitas & Gereja (Internal Form)</h5>
                    <a href="{{ route('admin_uyt_stories_export') }}" class="btn btn-success btn-sm mt-2 mt-sm-0">
                        <i class="fa fa-file-excel-o me-1"></i> Export Excel / CSV
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="40">No</th>
                                    <th>Pengirim & Kontak</th>
                                    <th>Gereja / Lembaga</th>
                                    <th>Judul & Isi Cerita</th>
                                    <th>Foto</th>
                                    <th width="100">Status</th>
                                    <th width="140">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stories as $index => $story)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $story->name }}</strong>
                                            <div class="small text-muted"><i class="fa fa-envelope me-1"></i>{{ $story->email }}</div>
                                            @if ($story->phone)
                                                <div class="small text-muted"><i class="fa fa-phone me-1"></i>{{ $story->phone }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $story->organization ?? '-' }}</td>
                                        <td>
                                            <strong class="text-primary">{{ $story->title }}</strong>
                                            <p class="small text-muted mb-0 mt-1">{{ Str::limit($story->story, 150) }}</p>
                                        </td>
                                        <td class="text-center">
                                            @if ($story->media)
                                                <a href="{{ asset($story->media) }}" target="_blank">
                                                    <img src="{{ asset($story->media) }}" width="50" height="50" class="rounded object-fit-cover" />
                                                </a>
                                            @else
                                                <span class="text-muted small">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($story->is_published)
                                                <span class="badge bg-success">Tayang</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Draft / Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <form method="POST" action="{{ route('admin_uyt_stories_toggle', $story->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs {{ $story->is_published ? 'btn-secondary' : 'btn-success' }}" title="Ubah Status Tayang">
                                                        <i class="fa {{ $story->is_published ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin_uyt_stories_delete', $story->id) }}" onsubmit="return confirm('Hapus cerita ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada kiriman cerita dari komunitas.</td>
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
