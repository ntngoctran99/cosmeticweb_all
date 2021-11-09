@extends('admin.layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Blog: {{ $item->title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">Edit Blog</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <div class="card card-info">
              <!-- form start -->
              <form id="BlogEditForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.blog.update', $item->id) }}" class="form-horizontal">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" value="{{ $item->title }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Content</label>
                    <div class="col-sm-9">
                      <textarea id="summernote" name="content">{!! $item->content !!}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3" style="padding-bottom: 20px;">
                      <img src="{{ asset($item->image) }}" width="150">
                    </div>
                    <label class="col-sm-3 col-form-label">Change Image</label>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="avatar">
                        <label class="custom-file-label" for="customFile">
                          Choose file
                        </label>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a href="{{ route('admin.blog.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
  <!-- jquery-validation -->
  <script src="{{ asset('admin-lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

  <script>
    $(function () {
      $('#BlogEditForm').validate({
        rules: {
          title: {
            required: true,
            maxlength: 255
          },
          content: {
            required: true,
          },
          avatar: {
            accept: "image/*"
          }
        },
        messages: {
          title: {
            required: "Please enter a title",
            maxlength: "The title can only be up to 255 characters long"
          },
          content: {
            required: "Please write content",
          },
          avatar: {
            accept: "Please upload file in these format only (jpg, jpeg, png)"
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('col-sm-9 offset-sm-3 invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
          $(form).submit();
        }
      });
    });
  </script>
@endpush

@push('scripts')
  <!-- editor -->
  <script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote({
         height: 200,
      })
    });
  </script>
@endpush

@push('scripts')
  <!-- editor -->
  <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

  <script>
    $(function () {
      bsCustomFileInput.init();
    });
  </script>
@endpush