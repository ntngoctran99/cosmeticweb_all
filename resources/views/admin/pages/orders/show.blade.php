@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order: {{ $item->fullname }} </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Order List</a></li>
              <li class="breadcrumb-item active">Order Detail</li>
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
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-8">
                    @if (session()->has('flashMes'))
                    <div class="alert alert-{{ session()->get('flashLevel') }} alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="icon fas fa-check"></i>
                      {{ session()->get('flashMes') }}
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    #
                  </div>
                  <div class="col-9">
                    {{ $item->id }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Created At
                  </div>
                  <div class="col-9">
                    {{ $item->created_at }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Full Name
                  </div>
                  <div class="col-9">
                    {{ $item->fullname }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Phone Number
                  </div>
                  <div class="col-9">
                    {{ $item->phone_number }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Address
                  </div>
                  <div class="col-9">
                    {{ $item->address }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Payment Method
                  </div>
                  <div class="col-9">
                    {{ Config::get('define.order.payment_title')[$item->payment]; }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Total
                  </div>
                  <div class="col-9">
                    {{ $item->total }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Status
                  </div>
                  <div class="col-9">
                    {{ Config::get('define.order.status_title')[$item->status]; }}
                    @if($item->status == 0 || $item->status == 1)
                        @foreach (Config::get('define.order.status') as $status)
                          @if ($status != $item->status)

                            | <a href="{{ route('admin.order.update.status', ['id' => $item->id, 'status' => $status]) }}">Change to {{ Config::get('define.order.status_title')[$status] }}</a>
                          @endif
                        @endforeach
                      @endif
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    Note
                  </div>
                  <div class="col-9">
                    {{ $item->note }}
                  </div>
                </div>



              </div>
              <!-- /.card-body -->
            </div>
          </div>

          @if (!empty ($item->orderDetail))
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3>Order Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($item->orderDetail as $key => $detail)
                    <tr>
                      <td>{{ $key + 1 }}.</td>
                      <td>{{ $detail->product->name }}</td>
                      <td>{{ $detail->quantity }}</td>
                      <td>{{ $detail->unit_price }}</td>
                      <td>{{ $detail->quantity * $detail->unit_price }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          @endif
	      </div>
	  </div>
	</section>
@endsection
