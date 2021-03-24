@extends('admin.master')
@section('main-content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="card mt-2">
					<div class="card-header">
		                <h3 class="card-title">Update Password</h3>
		            </div>
		            <form action="{{route('updatepassword')}}" class="form-horizontal" method="POST">
		            	@csrf
		            	{{method_field('PUT')}}
		            	<div class="card-body">
		            		<div class="form-group row">
		            		<label for="name" class="col-sm-3 col-form-label">Username</label>
		            		<div class="col-sm-6">
		            			{{auth()->user()->name}}
		            		</div>	
		            		</div>
		            		<div class="form-group row">
			            		<label for="name" class="col-sm-3 col-form-label">New password</label>
			            		<div class="col-sm-6">
			                      <input type="password" name="password" class="form-control @error('password')
			                      is-invalid @enderror" id="password">
			                      @error('password')
			                        <span class="invalid-feedback">{{$message}} </span>           
			                      @enderror
	                    		</div>	
		            		</div>

		            		<div class="form-group row">
			            		<label for="name" class="col-sm-3 col-form-label">Confirm password</label>
			            		<div class="col-sm-6">
			                      <input type="password" name="confirm_password" class="form-control @error('confirm_password')
			                      is-invalid @enderror" id="confirm_password">
			                      @error('confirm_password')
			                        <span class="invalid-feedback">{{$message}}</span>
			                      @enderror
	                    		</div>	
		            		</div>
		            	</div>
			            <div class="card-footer">
			            	<button type="submit" class="btn btn-info">Update Password</button>
			            </div>
			              <!--/.card footer-->
							</div>
		            <!--/.card footer-->
		            </form>

			</div>
		</div>
	</div>
</div>
@endsection