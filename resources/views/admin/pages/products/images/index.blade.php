@extends('admin.layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product Image: {{ $item->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
              <li class="breadcrumb-item active">Upload Product Image</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            @if (session()->has('flashMes'))
              <div class="alert alert-{{ session()->get('flashLevel') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>
                {{ session()->get('flashMes') }}
              </div>
            @endif
            
            @include('admin/pages/products/images/avatar')
          </div>
          <div class="col-md-12">
            @include('admin/pages/products/images/default_images')
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
      $('#ProductAvatarForm').validate({
        rules: {
          avatar: {
            required: true,
            accept: "image/*"
          }
        },
        messages: {
          avatar: {
            required: "Please choose the avatar",
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

    $('#ProductDefaultImageForm').validate({
        rules: {
          default_image: {
            required: true,
            accept: "image/*"
          }
        },
        messages: {
          default_image: {
            required: "Please choose the default image",
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
  <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

  <script>
    $(function () {
      bsCustomFileInput.init();
    });
  </script>
@endpush