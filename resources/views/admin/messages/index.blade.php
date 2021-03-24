@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">
          @include('admin.notify')
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">All Messages</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="button" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Messages</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($messages as $message)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$message->fname}}</td>
                      <td>{{$message->lname}}</td>
                      <td>{{$message->email}}</td>
                      <td><textarea rows="3" style="width:340px;">{{$message->message}}</textarea></td>
                      <td><a class="btn btn-danger" href="{{route('messages.destroy',$message->id)}}" onclick="
                      event.preventDefault();if(confirm('Do you want to delete'))
                      document.getElementById('delete{{$message->id}}').submit();
                      ">Delete</a>
                        <form action="{{route('messages.destroy',$message->id)}}" type="hidden" id="delete{{$message->id}}" method="POST">
                          @csrf
                          {{method_field('DELETE')}}
                        </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!--/.card footer-->
              <div class="card-footer">
                  
                </div>
              <!--/.card footer-->
            </div>
            <!-- /.card -->
				</div>
			</div>
		</div>
	</div>
@endsection