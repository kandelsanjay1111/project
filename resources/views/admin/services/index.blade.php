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
                <h3 class="card-title">All Services</h3>

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
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($service as $service)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$service->title}}</td>
                      <td style="max-width: 350px;"><textarea style="width:340px; height: 107px;">{{$service->description}}</textarea></td>
                      <td><img style="height:107px;" class="img-fluid" src="{{Storage::url($service->image)}}"></td>
                      <td>@if($service->status=="active")
                      Active @else Inactive @endif</td>
                      <td><span class="tag tag-success">{{$service->created_at}}</span></td>
                      <td><a href="{{route('services.edit',$service->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('services.destroy',$service->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$service->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('services.destroy',$service->id)}}" type="hidden" id="delete{{$service->id}}" method="POST">
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
                  <a href="{{route('services.create')}}" class="btn btn-info">Add Service</a>
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