<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Product Avatar</h3>
  </div>
  <!-- form start -->
  <form id="ProductAvatarForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.image.update.avatar', $item->id) }}" class="form-horizontal">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        @if (!empty($avatar))
          <div class="col-sm-9 offset-sm-3" style="padding-bottom: 20px;">
            <img src="{{ asset($avatar->image) }}" width="150">
          </div>
        @endif
        <label class="col-sm-3 col-form-label">Upload Image</label>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="avatarImage" name="avatar">
            <label class="custom-file-label" for="avatarImage">
              Choose file
            </label>
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
  <!-- form end -->
</div>