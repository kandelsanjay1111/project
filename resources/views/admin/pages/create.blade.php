@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Add page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('page.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control @error('name')
                      is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control @error('title')
                      is-invalid @enderror" id="title" name="title" placeholder="Enter Title" value="{{old('title')}}">
                      @error('title')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Keywords</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control @error('keywords')
                      is-invalid @enderror" id="keywords" name="keywords" placeholder="Enter keywords" value="{{old('keywords')}}">
                      @error('keywords')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea style="height:150px;" name="description" value="enter description" class="form-control @error('description') is-invalid @enderror">
                        {{old('description')}}
                      </textarea>@error('description')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control @error('author')
                      is-invalid @enderror" id="author" name="author" placeholder="Enter author" value="{{old('author')}}">
                      @error('author')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input id="inpfile" class="@error('image')
                      is-invalid @enderror" type="file" name="image">
                      @error('image')
                        <span class="invalid-feedback">{{$message}} </span>@enderror
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <img id="img_field" class="img-fluid" src="{{asset('admin/image/noimage.jpg')}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Create</button>
                  <a href="{{route('page.index')}}" class="btn btn-default float-right">Cancel</a>
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
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection