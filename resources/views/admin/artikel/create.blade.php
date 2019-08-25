{{-- NON AJAX --}}
@extends('layouts.master')

@section('title')
    Post Create
@endsection

@section('header') Buat Post @endsection
@section('desc') Tulis post barumu! @endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Hai, <b>{{ Auth::user()->name }}</b>. Buat post sekarang!</h4>
        </div>
        <div class="card-body">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input name="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" required>

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
                    {{--  <option value="">- Pilih Negara -</option>  --}}
                    @foreach ($negara as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Year Released</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control selectric" name="rilis" required>
                    <option value="">- Pick Year -</option>
                @foreach($year as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Genre</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control selectric" name="tag[]" multiple >
                    {{--  <option value="">- Pilih Genre -</option>  --}}
                    @foreach ($tag as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control selectric" name="kategori" required>
                    <option value="">- Pick Categories -</option>
                @foreach($cat as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Rating</label>
                <div class="col-sm-12 col-md-10">
                    <input name="rating" type="number" step="any" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" required>

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
                    <input name="durasi" type="number" class="form-control{{ $errors->has('durasi') ? ' is-invalid' : '' }}" required>

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
                    <input name="embed" type="text" class="form-control{{ $errors->has('embed') ? ' is-invalid' : '' }}" placeholder="ex : https://www.youtube.com/embed/RSXc5z9F7Do" required>

                @if ($errors->has('embed'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('embed') }}</strong>
                    </span>
                @endif
                </div>
            </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Content</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="konten" id="editor1"></textarea>

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
              <div id="image-preview" class="image-preview">
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
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Buat Post</button>
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

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/ckeditor/contents.css') }}">
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
    <script src="{{ asset('admin/assets/modules/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1')
    </script>
    {{--  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>  --}}
    <script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/features-post-create.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>
@endsection


{{-- AJAX --}}

{{-- @extends('layouts.master')

@section('title')
    Post Create
@endsection

@section('header') Buat Post @endsection
@section('desc') Tulis post barumu! @endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Hai, <b>{{ Auth::user()->name }}</b>. Buat post sekarang!</h4>
        </div>
        <div class="card-body">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input name="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}">

                @if ($errors->has('judul'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
                </div>
            </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control selectric" name="kategori">
                    <option value="">- Pilih Kategori -</option>
                @foreach($cat as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Content</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="konten" id="editor1"></textarea>

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
              <div id="image-preview" class="image-preview">
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
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tags</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control selectric" name="tag[]" multiple>
                    {{--  <option value="">- Pilih Tag -</option>  --}}
                    {{-- @foreach ($tag as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
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
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Buat Post</button>
              <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection --}}

{{-- @section('css') --}}
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css')}}"> --}}

    <!-- CSS Libraries -->

    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/ckeditor/contents.css') }}"> --}}
    {{--  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css')}}">  --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}"> --}}

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css')}}">
@endsection

@section('script') --}}
    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('admin/assets/modules/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1')
    </script>
    {{--  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>  --}}
    {{-- <script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('admin/assets/js/page/features-post-create.js')}}"></script> --}}

    <!-- Template JS File -->
    {{-- <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>
@endsection --}}
