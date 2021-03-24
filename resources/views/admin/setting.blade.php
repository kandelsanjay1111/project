@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
          @include('admin.notify')
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('setting.update',$setting->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control @error('name')
                      is-invalid @enderror" id="name" value="{{$setting->name}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control @error('email')
                      is-invalid @enderror" id="email" value="{{$setting->email}}">
                      @error('email')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                      <input type="number" name="number" class="form-control @error('number')
                      is-invalid @enderror" id="number" value="{{$setting->number}}">
                      @error('number')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                      <input type="text" name="location" class="form-control @error('location')
                      is-invalid @enderror" id="location" value="{{$setting->location}}">
                      @error('location')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                      <input class="@error('logo')
                      is-invalid @enderror" type="file" name="logo" id="inpfile">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <img id="img_field" class="img-fluid" src="{{Storage::url($setting->logo)}}">
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
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection