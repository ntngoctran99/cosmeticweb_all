@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Production</a></li>
              <li class="breadcrumb-item active">Create A Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
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
              <form id="ProductCreateForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.store') }}" class="form-horizontal">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name *</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea id="summernote" name="description"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Unit Price *</label>
                        <div class="col-sm-6">
                          <input type="text" name="unit_price" value="{{ old('unit_price') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label text-right">Stock</label>
                        <div class="col-sm-6">
                          <input type="text" name="stock" value="{{ old('stock') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Unit *</label>
                        <div class="col-sm-6">
                          <input type="text" name="unit" value="{{ old('unit') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label text-right">Views *</label>
                        <div class="col-sm-6">
                          <input type="text" name="views" value="{{ old('views') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
<!--                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Supplier *</label>
                        <div class="col-sm-6">
                          <select name="suppliers_id" class="form-control">
                            @foreach($supplier_list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>-->
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Product Type *</label>
                        <div class="col-sm-6">
                          <select name="type_id" class="form-control">
                            @foreach($product_type_list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Best Seller</label>
                        <div class="col-sm-6">
                          <input type="checkbox" value="1" name="best_seller" data-bootstrap-switch>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label text-right">Latest</label>
                        <div class="col-sm-6">
                          <input type="checkbox" value="1" name="latest" data-bootstrap-switch>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Top Rated</label>
                        <div class="col-sm-6">
                          <input type="checkbox" value="1" name="top_rated" data-bootstrap-switch>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label text-right">Sample Home</label>
                        <div class="col-sm-6">
                          <input type="checkbox" value="1" name="sample_home" data-bootstrap-switch>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a href="{{ route('admin.product.index') }}" class="btn btn-default float-right">Cancel</a>
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
      $.validator.addMethod('minStrict', function (value, el, param) {
          return this.optional(el) || value > param;
      });
      $('#ProductCreateForm').validate({
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
            stock: {
                minStrict: "The stock must be rather than 0",
                number: "The stock must be number"
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
