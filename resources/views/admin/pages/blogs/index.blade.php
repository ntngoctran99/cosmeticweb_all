@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">DashBoard</a></li>
              <li class="breadcrumb-item active">Blog List</li>
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
                  <div class="col-md-4">
                    <div class="card-tools float-right">
                      <a href="{{ route('admin.blog.create') }}" type="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus-circle"></i>
                        Add
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lists as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}.</td>
                      <td>{{ $item->title }}</td>
                      <td><img src="{{ asset($item->image) }}" width="150"></img></td>
                      <td>
                          @if ($item->del_flag == 0)
                            <a href="{{ route('admin.blog.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">
                              <i class="fas fa-edit"></i>
                              Edit
                            </a>
                              <form method="POST" action="{{ route('admin.blog.destroy', $item->id) }}" onSubmit="if(!confirm('Are you sure?')){return false;}">
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger btn-sm" style="margin-top: 5px;">
                                      <i class="fas fa-edit"></i>
                                      Delete
                                  </button>
                              </form>
                          @else
                              <p class="text-danger">Blog was deleted</p>
                          @endif
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
