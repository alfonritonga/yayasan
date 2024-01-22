@extends('layouts.app')

@section('title', 'Pencapaian')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pencapaian</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Pencapaian Baru</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                @if ($message = Session::get('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Pencapaian Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('achievement_add_post') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" required name="year" class="form-control"
                                            placeholder="Tahun">
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Total Donasi</label>
                                    <div class="col-sm-9">
                                        <input type="number" required name="total_donation" class="form-control"
                                            placeholder="Total Donasi">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Thumbnail Video</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="media" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Url Video</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="url_video" class="form-control">
                                    </div>
                                </div>
                                <fieldset class="mb-3">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0">Status</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="true"
                                                    checked>
                                                <label class="form-check-label">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="false">
                                                <label class="form-check-label">
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Program Terlaksana</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="program">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="addPrograms()">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="basic-list-group">
                                                    <ul class="list-group" style="padding-left: 0 !important"
                                                        id="list_program">

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
<script>
    function addPrograms() {
        let value = $('#program').val();
        if (value.length > 0) {
            $('#program').val('');
            $('#list_program').append(
                `<li
                    class="list-group-item d-flex justify-content-between align-items-center">
                    ` + value + `<span class="badge badge-danger badge-pill"
                        style="cursor: pointer" onclick="deleteMe(this)"><small><i
                                class="flaticon-019-close"></i>
                        </small></span>
                    <input type="hidden" name="programs[]" value="` + value + `">
                </li>`
            );
        }
    }

    function deleteMe(el) {
        let elemen = el.parentElement;
        elemen.remove();
    }
</script>
