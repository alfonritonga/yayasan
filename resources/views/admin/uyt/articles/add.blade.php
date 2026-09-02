@extends('layouts.app')

@section('title', 'Tambah Artikel UYT')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Use Your Talents</li>
                <li class="breadcrumb-item"><a href="{{ route('admin_uyt_articles') }}">Artikel UYT</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Artikel UYT</a></li>
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
                        <h4 class="card-title">Tambah Artikel & Berita UYT</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('admin_uyt_articles_add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Judul Artikel</label>
                                    <div class="col-sm-9">
                                        <input type="text" required name="title" class="form-control"
                                            placeholder="Judul Artikel UYT">
                                    </div>
                                </div>
                                <div class="mb-3 row custom-ekeditor">
                                    <label class="col-sm-3 col-form-label">Isi Konten Artikel</label>
                                    <div class="col-sm-9">
                                        <textarea id="description" name="description" cols="30" rows="12" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Gambar Utama / Banner</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="media" class="form-control" accept="image/*">
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

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const desc = document.querySelector('#description');
            if (desc && typeof ClassicEditor !== 'undefined') {
                ClassicEditor.create(desc, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo']
                }).catch(function(error) {
                    console.error(error);
                });
            } else if (desc && typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('description');
            }
        });
    </script>
@endsection
