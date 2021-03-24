@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Create Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('clients.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" required="" name="email" value="{{old('email')}}">
                      @error('email')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">number</label>
                    <div class="col-sm-10">
                      <input type="number" required="" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Mobile Number" name="number" value="{{old('number')}}">
                      @error('number')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">Image</label>
                    <input type="file" name="image" id="inpfile">
                    @error('image')
                      <span class="invalid-feedback">{{$message}} </span>
                    @enderror
                  </div>
                  <div class="col-sm-4">
                    <img id="img_field" class="img-fluid" src="{{asset('admin/image/noimage.jpg')}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Create</button>
                  <a href="{{route('clients.index')}}" class="btn btn-default float-right">Cancel</a>
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