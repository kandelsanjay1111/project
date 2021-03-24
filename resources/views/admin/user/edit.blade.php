@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('user-update',$user->id)}}" class="form-horizontal" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control @error('name')
                      is-invalid @enderror" id="name" value="{{$user->name}}">
                      @error('name')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control @error('email')
                      is-invalid @enderror" id="email" value="{{$user->email}}">
                      @error('email')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">number</label>
                    <div class="col-sm-10">
                      <input type="number" name="number" class="form-control @error('number')
                      is-invalid @enderror" id="number" value="{{$user->number}}">
                      @error('number')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input"  id="status" name="status" {{($user->status=='yes')?'checked':" "}}>
                    <label class="form-check-label">Active</label>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{route('user')}}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
				</div>
			</div>
		</div>
	</div>
@endsection