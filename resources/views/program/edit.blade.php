@extends('layouts.app')

@section('title', 'Program')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Program</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ubah Program</a></li>
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
                        <h4 class="card-title">Ubah Program</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('program_edit', $program->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Judul</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="title" class="form-control"
                                            value="{{ $program->title }}">
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" cols="30" rows="30" class="form-control" required>{{ $program->description }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Media</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-9">
                                            <img src="{{ asset($program->media) }}" width="200" height="200"
                                                id="img-placed">
                                            <br>
                                            <input type="file" name="media" class="form-control" value=""
                                                onchange="getImage()">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Posisi Gambar</label>
                                    <div class="col-sm-9">
                                        <select name="image_position" class="form-control">
                                            <option value="0" @if ($program->image_position == 0) selected @endif>Kanan
                                            </option>
                                            <option value="1" @if ($program->image_position == 1) selected @endif>Kiri
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Tasks</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="task">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="addCelebrity()">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="basic-list-group">
                                                    <ul class="list-group" style="padding-left: 0 !important"
                                                        id="list_task">
                                                        @foreach ($program->tasks as $i)
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $i->task }} <span
                                                                    class="badge badge-danger badge-pill"
                                                                    style="cursor: pointer"
                                                                    onclick="deleteMe(this)"><small><i
                                                                            class="flaticon-019-close"></i>
                                                                    </small></span>
                                                                <input type="hidden" name="tasks[]"
                                                                    value="{{ $i->task }}">
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
    function addCelebrity() {
        let value = $('#task').val();
        if (value.length > 0) {
            $('#task').val('');
            $('#list_task').append(
                `<li
                    class="list-group-item d-flex justify-content-between align-items-center">
                    ` + value + `<span class="badge badge-danger badge-pill"
                        style="cursor: pointer" onclick="deleteMe(this)"><small><i
                                class="flaticon-019-close"></i>
                        </small></span>
                    <input type="hidden" name="tasks[]" value="` + value + `">
                </li>`
            );
        }
    }

    function getImage() {
        $('#img-placed').hide();
    }

    function deleteMe(el) {
        let elemen = el.parentElement;
        elemen.remove();
    }
</script>
