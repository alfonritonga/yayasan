@extends('layouts.app')

@section('title', 'Pencapaian')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pencapaian</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ubah Pencapaian</a></li>
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
                        <h4 class="card-title">Ubah Pencapaian</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('achievement_edit_patch', $achievement->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" required name="year" class="form-control"
                                            value="{{ $achievement->year }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Thumbnail</label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset($achievement->media) }}" height="200">
                                        <br>
                                        <input type="file" name="media" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Url</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="url_video" class="form-control"
                                            value="{{ $achievement->url_video }}">
                                    </div>
                                </div>
                                <fieldset class="mb-3">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0">Status</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="true"
                                                    @if ($achievement->status == 1) checked @endif>
                                                <label class="form-check-label">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="false"
                                                    @if ($achievement->status == 0) checked @endif>
                                                <label class="form-check-label">
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Donasi Terkumpul</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="name_donation"
                                                        placeholder="Nama Donasi">
                                                    <input type="number" class="form-control" id="total_donation"
                                                        placeholder="Total Donasi">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="addDonations()">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="basic-list-group">
                                                    <ul class="list-group" style="padding-left: 0 !important"
                                                        id="list_donation">
                                                        @foreach ($achievement->donations as $i)
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $i->name }}<strong>{{ 'Rp. ' . number_format($i->total_donation, 0, '.', '.') }}</strong>
                                                                <span class="badge badge-danger badge-pill"
                                                                    style="cursor: pointer"
                                                                    onclick="deleteMe(this)"><small><i
                                                                            class="flaticon-019-close"></i>
                                                                    </small></span>
                                                                <input type="hidden" name="name_donations[]"
                                                                    value="{{ $i->name }}">
                                                                <input type="hidden" name="total_donations[]"
                                                                    value="{{ (int) $i->total_donation }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Program Terlaksana</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="program">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="addProgram()">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="basic-list-group">
                                                    <ul class="list-group" style="padding-left: 0 !important"
                                                        id="list_program">
                                                        @foreach ($achievement->programs as $i)
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $i->program }} <span
                                                                    class="badge badge-danger badge-pill"
                                                                    style="cursor: pointer"
                                                                    onclick="deleteMe(this)"><small><i
                                                                            class="flaticon-019-close"></i>
                                                                    </small></span>
                                                                <input type="hidden" name="programs[]"
                                                                    value="{{ $i->program }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
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
    function addDonations() {
        let name_donation = $('#name_donation').val();
        let total_donation = $('#total_donation').val();
        if (name_donation.length > 0 && total_donation.length > 0) {
            total_donation = parseInt(total_donation);
            $('#name_donation').val('');
            $('#total_donation').val('');
            $('#list_donation').append(
                `<li
                    class="list-group-item d-flex justify-content-between align-items-center">
                    ` + name_donation + ` : <strong> ` + formatRupiah(total_donation.toString(), "Rp. ") + `</strong>
                    <span class="badge badge-danger badge-pill"
                        style="cursor: pointer" onclick="deleteMe(this)"><small><i
                                class="flaticon-019-close"></i>
                        </small></span>
                    <input type="hidden" name="name_donations[]" value="` + name_donation + `">
                    <input type="hidden" name="total_donations[]" value="` + total_donation + `">
                </li>`
            );
        }
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }



    function addProgram() {
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
