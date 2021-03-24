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
                <h3 class="card-title">Our Clients</h3>

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
                      <th> Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($client as $client)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$client->name}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->number}}</td>
                      <td>
                        <img style="width:100px; height:100px;" src="{{Storage::url($client->image)}}">
                      </td>
                      <td><a href="{{route('clients.edit',$client->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('clients.destroy',$client->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$client->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('clients.destroy',$client->id)}}" type="hidden" id="delete{{$client->id}}" method="POST">
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
                  <a href="{{route('clients.create')}}" class="btn btn-info">Add Client</a>
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