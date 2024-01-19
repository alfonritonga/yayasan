@extends('layouts.app')

@section('title', 'Program')

@section('content')

    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Program</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Program</a></li>
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
                        <strong>Mantap bro!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <!-- <div class="row"> -->
                        <div class="col-xl-6">
                            <h4 class="card-title">Program</h4>
                        </div>
                        <div class="col-xl- d-flex flex-column align-items-end">
                            <a href="{{ route('program_view_add') }}" class="btn btn-outline-primary">Tambah Data</a>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Media</th>
                                        <th>Task</th>
                                        <th>Posisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($program as $key => $x)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $x->title }}</td>
                                            <td>{{ Illuminate\Support\Str::limit($x->description, 50) }}...</td>
                                            <td><a target="_blank" href="../{{ $x->media }}"> {{ $x->media }}</a>
                                            </td>
                                            <td>
                                                @foreach ($x->tasks as $i)
                                                    <small>- {{ $i->task }}</small><br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($x->image_position == 0)
                                                    Kanan
                                                @else
                                                    Kiri
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('program_edit_view', $x->id) }}"
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
            swal({
                    title: "Yakin bro?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: `/programs/${id}`,
                            method: 'DELETE',
                            data: {
                                _token: CSRF_TOKEN
                            },
                            success: function(res, data) {
                                if (res.status == true) {
                                    swal("Success", "Program berhasil di hapus yaa!", "success");
                                    window.location.reload();
                                } else {
                                    swal({
                                        title: "Oppsss",
                                        text: res.error,
                                        timer: 2e3,
                                        showConfirmButton: !1
                                    })
                                }
                            },
                            error: function(error) {
                                console.log(error)
                                swal({
                                    title: "Oppsss",
                                    text: "Sorry bro lagi ada masalah!",
                                    timer: 2e3,
                                    showConfirmButton: !1
                                })
                            }
                        })
                    } else {}
                });
        }
    </script>
@endsection
