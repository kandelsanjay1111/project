@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Edit Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('accounts.update',$account->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control @error('name')
                      is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{$account->name}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Url link</label>
                    <div class="col-sm-10">
                      <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Enter link" required="" name="link" value="{{$account->url}}">
                      @error('link')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{route('accounts.index')}}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
				</div>
			</div>
		</div>
	</div>
@endsection