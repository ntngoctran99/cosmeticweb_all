@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Supplier: {{ $item->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.supplier.index') }}">Suppliers</a></li>
              <li class="breadcrumb-item active">Update Supplier Info</li>
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
              <form id="SupplierUpdateForm" method="POST" action="{{ route('admin.supplier.update', $item->id) }}" class="form-horizontal">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <input type="text" name="address" value="{{ $item->address }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" name="email" value="{{ $item->email }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                      <input type="text" name="phone_number" value="{{ $item->phone_number }}" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a href="{{ route('admin.supplier.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
	  </div>
	</section>
@endsection

@push('scripts')
  <!-- jquery-validation -->
  <script src="{{ asset('admin-lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

  <script>
$(function () {
  $('#SupplierUpdateForm').validate({
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
      address: {
        required: true,
        maxlength: 255
      },
      email: {
        required: true,
        email: true,
        maxlength: 255
      },
      phone_number: {
        required: true,
        maxlength: 20
      }
    },
    messages: {
      name: {
        required: "Please enter a name",
        maxlength: "Your name can only be up to 50 characters long"
      },
      address: {
        required: "Please enter a address",
        maxlength: "Your address can only be up to 255 characters long"
      },
      email: {
        required: "Please enter a email",
        email: "Please enter a vaild email address",
        maxlength: "Your email can only be up to 255 characters long"
      },
      phone_number: {
        required: "Please enter a phone",
        maxlength: "Your phone can only be up to 20 characters long"
      }
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