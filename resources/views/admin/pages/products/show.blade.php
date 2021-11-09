@extends('admin.layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Info: {{ $item->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Production</a></li>
              <li class="breadcrumb-item active">Product Info</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-info">
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <span>{{ $item->name }}</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      {!! $item->description !!}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit Price</label>
                    <div class="col-sm-9">
                      ${{ number_format($item->unit_price, 2) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Promotion Price</label>
                    <div class="col-sm-9">
                      {{ $item->promotion_price }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit</label>
                    <div class="col-sm-9">
                      {{ $item->unit }}
                    </div>
                  </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">In Stock</label>
                        <div class="col-sm-9">
                            {{ $item->stock }}
                        </div>
                    </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Views</label>
                    <div class="col-sm-9">
                      {{ $item->views }}
                    </div>
                  </div>

{{--                  <div class="form-group row">--}}
{{--                    <label class="col-sm-3 col-form-label">Supplier</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                      {{ $item->supplier->name }}--}}
{{--                    </div>--}}
{{--                  </div>--}}

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Product Type</label>
                    <div class="col-sm-9">
                      {{ $item->producttype->name }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Best Seller</label>
                    <div class="col-sm-9">
                      @if($item->best_seller == 1) ON @else OFF @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Latest</label>
                    <div class="col-sm-9">
                      @if($item->latest == 1) ON @else OFF @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Top Rated</label>
                    <div class="col-sm-9">
                      @if($item->top_rated == 1) ON @else OFF @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sample Home</label>
                    <div class="col-sm-9">
                      @if($item->sample_home == 1) ON @else OFF @endif
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">EDIT</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <a href="{{ route('admin.product.edit_info', $item->id) }}" class="btn btn-outline-warning btn-sm">
                      <i class="fas fa-edit"></i>
                      Edit Info
                    </a>
                  </div>
                  <div class="col-md-6">
                    <form method="POST" action="{{ route('admin.product.destroy', $item->id) }}" onSubmit="if(!confirm('Are you sure?')){return false;}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                          <i class="fas fa-edit"></i>
                          Delete
                        </button>
                      </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
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
      $.validator.addMethod('minStrict', function (value, el, param) {
          return this.optional(el) || value > param;
      });
      $('#ProductTypeCreateForm').validate({
        rules: {
          name: {
            required: true,
            maxlength: 255
          },
          unit_price: {
            required: true,
            minStrict: 0,
            number: true
          },
          promotion_price: {
            minStrict: 0,
            number: true
          },
          unit: {
            required: true,
            maxlength: 255
          },
          views: {
            required: true,
            minStrict: 0,
            number: true
          },
          type_id: {
            required: true,
          },
          suppliers_id: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Please enter a name",
            maxlength: "The name can only be up to 255 characters long"
          },
          unit_price: {
            required: "Please enter a unit price",
            minStrict: "The unit price must be rather than 0",
            number: "The unit price must be number"
          },
          promotion_price: {
            minStrict: "The promotion price must be rather than 0",
            number: "The promotion price must be number"
          },
          unit: {
            required: "Please enter a unit",
            maxlength: "The unit can only be up to 255 characters long"
          },
          views: {
            required: "Please enter a views",
            minStrict: "The views must be rather than 0",
            number: "The views must be number"
          },
          type_id: {
            required: "Please choose a product type",
          },
          suppliers_id: {
            required: "Please choose a supplier",
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
  <!-- Bootstrap Switch -->
  <script src="{{ asset('admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
  <script>
    $(function () {
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
    });
  </script>
@endpush
