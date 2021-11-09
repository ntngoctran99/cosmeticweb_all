@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item active">Order List</li>
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lists as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}.</td>
                      <td>{{ $item->fullname }}</td>
                      <td>{{ $item->address }}</td>
                      <td>{{ Config::get('define.order.status_title')[$item->status]; }}</td>
                      <td>{{ $item->total }}</td>
                      <td>
                        <a href="{{ route('admin.order.show', $item->id) }}" class="btn btn-outline-info btn-sm">
                          <i class="fas fa-eye"></i>
                          View
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $lists->links('admin/blocks/pagination') }}
              </div>
            </div>
          </div>
	      </div>
	  </div>
	</section>
@endsection