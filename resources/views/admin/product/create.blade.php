@extends('admin.master')
@section('head')
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('products.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name')
                      is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Product slug</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('slug')
                      is-invalid @enderror" id="slug" name="slug" placeholder="Enter Name" value="{{old('slug')}}">
                      @error('slug')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="Enter brand" name="brand" value="{{old('brand')}}">
                      @error('brand')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                      <div class="custom-file">
                        <input name="image" type="file" class=" @error('image') is-invalid @enderror custom-file-input" id="inpfile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-8">
                      <img id="img_field" class="img-fluid" src="{{asset('admin/image/noimage.jpg')}}">
                    </div>
                    @error('image')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea id="description" name="description" class="form-control">
                        {{old('description')}}
                      </textarea>
                    </div>
                    @error('description')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Specification</label>
                    <div class="col-sm-10">
                      <textarea id="specification" name="specification" class="form-control">
                        {{old('specification')}}
                      </textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Create</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#specification').summernote();
    $('#description').summernote();
  })
</script>
@endsection