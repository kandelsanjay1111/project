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
                <h3 class="card-title">Update Testimonial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name')
                      is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{$testimonial->name}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="post" class="col-sm-2 col-form-label"> Post</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('post')
                      is-invalid @enderror" id="name" name="post" placeholder="Enter Post" value="{{$testimonial->post}}">
                      @error('post')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea style="height:150px;" name="description" class="form-control @error('description') is-invalid @enderror">
                        {{$testimonial->description}}
                      </textarea>@error('description')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                      
                    
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label"> Image</label>
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
                    @error('image')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                    <div class="col-sm-8 mt-2">
                      <img class="img-fluid" id="img_field" style="height:250px;" src="{{asset(Storage::url($testimonial->image))}}">
                    </div>
                    
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{route('testimonials.index')}}" class="btn btn-default float-right">Cancel</a>
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
<script>
  $(function () {
    // Summernote
    $('#description').summernote();
  })
</script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection