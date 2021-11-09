<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Product Default Image</h3>
  </div>
  <!-- form start -->
  <form id="ProductDefaultImageForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.image.update.default_image', $item->id) }}" class="form-horizontal">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        @if (!empty($default_imgs))
          <div class="col-12" style="padding-bottom: 20px;">
            @foreach ($default_imgs as $default_img)
            <img src="{{ asset($default_img->image) }}" style="width: 150px; margin-right: 20px; margin-bottom: 20px;">
            @endforeach
          </div>
        @endif
        <label class="col-sm-3 col-form-label">Upload Image</label>
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="defaultImage" name="default_image">
            <label class="custom-file-label" for="defaultImage">
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