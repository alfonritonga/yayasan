@extends('layouts.app')

@section('title', 'Artikel UYT')

@section('content')

    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Use Your Talents</li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Artikel & Berita UYT</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('message'))
                    <div class="alert alert-primary alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                        <strong>Berhasil!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Daftar Artikel & Berita UYT</h4>
                        <a href="{{ route('admin_uyt_articles_add_view') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus me-1"></i> Tambah Artikel UYT
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Media</th>
                                        <th>Judul</th>
                                        <th>Admin</th>
                                        <th>Status </th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $x)
                                        <tr>
                                            <td>
                                                @if (!empty($x->media))
                                                    <a href="javascript:void(0)" onclick="previewImageModal('{{ asset($x->media) }}', '{{ addslashes($x->title) }}')" title="Klik untuk lihat preview">
                                                        <img src="{{ asset($x->media) }}" alt="Preview" style="width: 55px; height: 55px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; transition: transform .2s;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'" />
                                                    </a>
                                                @else
                                                    <span class="badge light badge-light text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $x->title }}</td>
                                            <td>{{ $x->admin->first_name ?? '' }} {{ $x->admin->last_name ?? '' }}</td>
                                            @if ($x->status == 1)
                                                <td><span class="badge light badge-success">Aktif</span></td>
                                            @else
                                                <td><span class="badge light badge-warning">Tidak Aktif</span></td>
                                            @endif
                                            <td>{{ $x->created_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin_uyt_articles_edit_view', $x->id) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="deleteData({{ $x->id }})"
                                                        class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('script')
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data artikel UYT ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin-uyt/articles/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection
