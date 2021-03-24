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
                <h3 class="card-title">All Carousels</h3>

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
                      <th>Subtitle</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($carousels as $carousel)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$carousel->title}}</td>
                      <td>
                        <textarea style="width:340px; height: 107px;">{{$carousel->description}}</textarea></td>
                      <td><img style="height:107px;width:180px;" src="{{Storage::url($carousel->image)}}"></td>
                      <td><span class="tag tag-success">{{$carousel->created_at}}</span></td>
                      <td><a href="{{route('carousels.edit',$carousel->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('carousels.destroy',$carousel->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$carousel->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('carousels.destroy',$carousel->id)}}" type="hidden" id="delete{{$carousel->id}}" method="POST">
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
                  <a href="{{route('carousels.create')}}" class="btn btn-info">Add Carousel</a>
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