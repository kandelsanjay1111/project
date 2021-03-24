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
                <h3 class="card-title">Edit Carousel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('carousels.update',$carousel->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label"> Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('title')
                      is-invalid @enderror" id="title" name="title" placeholder="Enter Title" value="{{$carousel->title}}">
                      @error('title')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">subtitle</label>
                    <div class="col-sm-10">
                      <textarea style="height:90px;" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror">
                        {{$carousel->description}}
                      </textarea>@error('subtitle')
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
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-8 mt-2">
                      <img id="img_field" class="img-fluid"  src="{{asset(Storage::url($carousel->image))}}">
                    </div>
                    @error('image')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{route('carousels.index')}}" class="btn btn-default float-right">Cancel</a>
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