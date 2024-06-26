@extends('layouts.app')

@section('title', 'Partner')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Partner</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ubah List</a></li>
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
                        <h4 class="card-title">Ubah List Partner</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('partner-list_edit_patch', $partner_list->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Judul</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="title" class="form-control"
                                            value="{{ $partner_list->title }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Kategori Partner</label>
                                    <div class="col-sm-9">
                                        <select name="partner_id" required class="form-control">
                                            @foreach ($partner as $x)
                                                <option value="{{ $x->id }}"
                                                    @if ($x->id == $partner_list->partner_id) selected @endif>{{ $x->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="description" class="form-control"
                                            value="{{ $partner_list->description }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Media</label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset($partner_list->media) }}" width="200" height="200"
                                            id="img-placed">
                                        <br>
                                        <input type="file" name="media" class="form-control" value=""
                                            onchange="getImage()">
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
    <script>
        function getImage() {
            $('#img-placed').hide();
        }
    </script>
@endsection
