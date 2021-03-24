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
                <h3 class="card-title">Social Accounts</h3>

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
                      <th>Url</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($account as $account)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$account->name}}</td>
                      <td>{{$account->url}}</td>
                      <td><span class="tag tag-success">{{$account->created_at}}</span></td>
                      <td><a href="{{route('accounts.edit',$account->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('accounts.destroy',$account->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$account->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('accounts.destroy',$account->id)}}" type="hidden" id="delete{{$account->id}}" method="POST">
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
                  <a href="{{route('accounts.create')}}" class="btn btn-info">Add Social Account</a>
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