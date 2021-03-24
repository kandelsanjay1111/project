@extends('admin.master')
@section('head')
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
          @include('admin.notify')
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">About Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('about.update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea id="description" name="description" class="form-control">
                        {{$about->description}}
                      </textarea>
                    </div>
                    @error('description')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label"> Image</label>
                    <div class="col-sm-10">
                        <input name="image" type="file" class=" @error('image') is-invalid @enderror" id="inpfile">
                    </div>
                    
                    </div>
                    <div class="col-sm-8 mt-2">
                      <img id="img_field" class="img-fluid"  src="{{Storage::url($about->image)}}">
                    </div>
                    @error('image')
                        <span class="invalid-feedback">{{$message}} </span>    
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="" class="btn btn-default float-right">Cancel</a>
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
<script>
  $(function () {
    $('#description').summernote();
  })
</script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

@endsection