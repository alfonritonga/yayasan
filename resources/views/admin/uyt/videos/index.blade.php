@extends('layouts.app')

@section('title', 'Video Kegiatan UYT')

@section('content')

    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Use Your Talents</li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Video Kegiatan UYT</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('message'))
                    <div class="alert alert-primary alert-dismissible fade show">
                        <strong>Berhasil!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title">Daftar Video Dokumentasi UYT</h4>
                        <a href="{{ route('admin_uyt_videos_add_view') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus me-1"></i> Tambah Video UYT
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Judul Video</th>
                                        <th>URL YouTube</th>
                                        <th>Admin</th>
                                        <th>Status </th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $x)
                                        <tr>
                                            <td><strong>{{ $x->title }}</strong></td>
                                            <td>
                                                <a href="{{ $x->url_video }}" target="_blank" class="badge light badge-danger">
                                                    <i class="fa fa-youtube-play me-1"></i> Buka Video
                                                </a>
                                            </td>
                                            <td>{{ $x->admin->first_name ?? '' }} {{ $x->admin->last_name ?? '' }}</td>
                                            @if ($x->status == 1)
                                                <td><span class="badge light badge-success">Aktif</span></td>
                                            @else
                                                <td><span class="badge light badge-warning">Tidak Aktif</span></td>
                                            @endif
                                            <td>{{ $x->created_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin_uyt_videos_edit_view', $x->id) }}"
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
                text: "Data video UYT ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin-uyt/videos/" + id,
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
