@extends('layouts.master')

@section('title')
    Post Edit
@endsection

@section('header') Edit Post @endsection
@section('desc') Tulis post barumu! @endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Hai, <b>{{ Auth::user()->name }}</b>. Edit postmu!</h4>
        </div>
        <div class="card-body">
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input name="judul" value="{{ $artikel->judul }}" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}">

                @if ($errors->has('judul'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Country</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control selectric" name="negara[]" multiple>
                    {{--  <option value="">- Pilih Country -</option>  --}}
                    @foreach ($negara as $data)
                        <option value="{{ $data->id }}" {{ (in_array($data->id, $select)) ? 'selected' : '' }}>{{ $data->name }}</option>
                    @endforeach
                </select>

            @if ($errors->has('negara'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('negara') }}</strong>
                </span>
            @endif
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Genre</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control selectric" name="tag[]" multiple>
                    {{--  <option value="">- Pilih Genre -</option>  --}}
                    @foreach ($tag as $data)
                        <option value="{{ $data->id }}" {{ (in_array($data->id, $select)) ? 'selected' : '' }}>{{ $data->name }}</option>
                    @endforeach
                </select>

            @if ($errors->has('tag'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tag') }}</strong>
                </span>
            @endif
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Year Released</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control selectric" name="rilis">
                <option value="">-- Pilih Tahun Rilis --</option>
                @foreach($rilis as $data)
                    <option value="{{ $data->id }}" {{ ($data->id == $artikel->rilis_id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control selectric" name="kategori">
                <option value="">-- Pilih Kategori --</option>
                @foreach($cat as $data)
                    <option value="{{ $data->id }}" {{ ($data->id == $artikel->kategori_id) ? 'selected' : '' }}>{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Rating</label>
                <div class="col-sm-12 col-md-10">
                    <input name="rating" value="{{ $artikel->rating }}" type="number" step="any" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}">

                @if ($errors->has('rating'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('rating') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Duration</label>
                <div class="col-sm-12 col-md-10">
                    <input name="durasi" value="{{ $artikel->durasi }}" type="number" class="form-control{{ $errors->has('durasi') ? ' is-invalid' : '' }}">

                @if ($errors->has('durasi'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('durasi') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Embed Youtube</label>
                <div class="col-sm-12 col-md-10">
                    <input name="embed" value="{{ $artikel->embed }}" type="text" class="form-control{{ $errors->has('embed') ? ' is-invalid' : '' }}">

                @if ($errors->has('embed'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('embed') }}</strong>
                    </span>
                @endif
                </div>
            </div>

          <div class="form-group row mb-12">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Content</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="konten" id="editor1">{{ $artikel->konten }}</textarea>

            @if ($errors->has('konten'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('konten') }}</strong>
                </span>
            @endif
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Thumbnail</label>
            <div class="col-sm-12 col-md-10">
              <div id="image-preview" class="image-preview" style="background-image: url('{{ asset('assets/img/artikel/'.$artikel->foto) }}'); background-size: cover; background-position: center center;">
                <label for="image-upload" id="image-label">Choose File</label>
                <input type="file" name="foto" id="image-upload" />

            @if ($errors->has('foto'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('foto') }}</strong>
                </span>
            @endif
              </div>
            </div>
          </div>
          
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-success">Edit Post</button>
              <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('css')
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/ckeditor/contents.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jquery-selectric/selectric.css')}}">
    {{--  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css')}}">  --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css')}}">
@endsection

@section('script')
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
    {{--  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>  --}}
    <script src="{{ asset('admin/assets/modules/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1')
    </script>
    <script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/features-post-create.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>
@endsection
