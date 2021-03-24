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
                <h3 class="card-title">All pages</h3>

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
                      <th>Title</th>
                      <th>Keywords</th>
                      <th>Description</th>
                      <th>Author</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($page as $page)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$page->name}}</td>
                      <td>{{$page->title}}</td>
                      <td>{{$page->meta_keyword}}</td>
                      <td><textarea rows="4" style="width:300px;">{{$page->meta_description}}</textarea></td>
                      <td>{{$page->meta_author}}</td>
                      <td><img style="width:150px; height:150px;" src="{{Storage::url($page->image)}}"></td>
                      <td><a href="{{route('page.edit',$page->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('page.destroy',$page->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$page->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('page.destroy',$page->id)}}" type="hidden" id="delete{{$page->id}}" method="POST">
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
                  <a href="{{route('page.create')}}" class="btn btn-info">Add Page</a>
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