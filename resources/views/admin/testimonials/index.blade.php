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
                <h3 class="card-title">All Testimonials</h3>

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
                      <th>Post</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($testimonial as $testimonial)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$testimonial->name}}</td>
                      <td>{{$testimonial->post}}</td>
                      <td>
                        <textarea style="width:340px; height: 107px;">{{$testimonial->description}}</textarea></td>
                      <td><img style="height:107px;" src="{{Storage::url($testimonial->image)}}"></td>
                      <td><span class="tag tag-success">{{$testimonial->created_at}}</span></td>
                      <td><a href="{{route('testimonials.edit',$testimonial->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('testimonials.destroy',$testimonial->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$testimonial->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('testimonials.destroy',$testimonial->id)}}" type="hidden" id="delete{{$testimonial->id}}" method="POST">
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
                  <a href="{{route('testimonials.create')}}" class="btn btn-info">Add Testimonial</a>
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