@extends('admin.master')
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">
          @include('admin.notify')
					<div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">All Products</h3>

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
                      <th> Slug</th>
                      <th> Brand</th>
                      <th> Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product as $product)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->slug}}</td>
                      <td>{{$product->brand}}</td>
                      <td><img style="width:100px;" src="{{Storage::url($product->image)}}"></td>
                      <td><span class="tag tag-success">{{$product->created_at}}</span></td>
                      <td><a href="{{route('products.show',$product->id)}}"><i class="fas fa-eye"></i>/</a><a href="{{route('products.edit',$product->id)}}"><i class="fas fa-edit"></i>/</a><a href="{{route('products.destroy',$product->id)}}" onclick="event.preventDefault();if(confirm('Do you want to delete'))document.getElementById('delete{{$product->id}}').submit();"><i class="fas fa-trash"></i></a>
                        <form action="{{route('products.destroy',$product->id)}}" type="hidden" id="delete{{$product->id}}" method="POST">
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
                  <a href="{{route('products.create')}}" class="btn btn-info">Add Product</a>
                </div>
              <!--/.card footer-->
            </div>
            <!-- /.card -->
				</div>
			</div>
		</div>
	</div>
@endsection