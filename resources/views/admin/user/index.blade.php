@extends('admin.master')
@section('main-content')
<!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-12">
            @include('admin.notify')
            <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

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
                      <th>Name</th>
                      <th> Email</th>
                      <th> Mobile No</th>
                      <th> Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user as $user)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->number}}</td>
                      <td>@if($user->status=="yes")
                      Active @else Inactive @endif</td>
                      <td><span class="tag tag-success">{{$user->created_at}}</span></td>
                      <td><a href="{{route('user-edit',$user->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('user-destroy',$user->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$user->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('user-destroy',$user->id)}}" type="hidden" id="delete{{$user->id}}" method="POST">
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
                  <a href="{{route('user-create')}}" class="btn btn-info">Add User</a>
                  <a class="btn btn-success float-right" href="{{route('editpassword')}}">Password Update</a>
                </div>
              <!--/.card footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
@endsection