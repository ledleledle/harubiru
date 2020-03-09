@extends('admin-template.page')
@section('title', 'Konfigurasi Website')
@section('activeconfigurations', 'active')
@section('content')

<style>
  input[type="file"] {
    display: none;
  }
</style>
<!-- Page Heading -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Konfigurasi Website</h1>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    <div class="section-body">
      <div class="row">
        <div class="col-6">
          <div class="card">
            @error('success')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
            </div>
            @enderror
            <div class="card-header py-3">
              <h4>Konfigurasi Nama Website</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="{{ route('webmanager.sites.update', '1') }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label>Nama Website</label>
                  @error('appname')
                  <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                  @enderror
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-globe-asia"></i>
                      </div>
                    </div>
                    <input type="text" name="sitename" class="form-control @error('sitename') is-invalid @enderror" value="{{ $sites->sitename }}">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-success btn-icon btn-icon-left btn-block">
                    <i class="fas fa-flag"></i>
                    <span class="text">Update Nama Website</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header" style="margin-top: -20px">
                <h4>Ubah Logo Website</h4>
                <div class="card-header-action">
                  <div class="form-group">
                    <label for="file-upload" class="btn btn-primary" style="margin-top: 25px;color: #fff;">Ganti Logo</label>
                    <input id="file-upload" name="logo" type="file" />
                  </div>
                </div>
              </div>
              <div class="card-body">
                @error('success')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
                @enderror
                <div class="mb-2 text-muted">Klik Foto Untuk Menampilkan Ukuran Penuh.</div>
                <div class="chocolat-parent">
                  <a href="{{ asset($sites->logo) }}" class="chocolat-image" title="{{ $sites->sitename }}">
                    <div data-crop-image="285">
                      <img alt="image" src="{{ asset($sites->logo) }}" class="img-fluid">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header py-3">
                <h4>Konfigurasi Tentang Desa</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Ubah Info Tentang Desa</label>
                  <textarea id="editor" name="about">{{ $sites->about }}</textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-success btn-icon btn-icon-left btn-block">
                    <i class="fas fa-flag"></i>
                    <span class="text">Update Info Tentang Desa</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- CKEditor -->
<script>
  CKEDITOR.replace('editor', {
    language: 'en',
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  });
</script>
@endsection