@extends('admin.master')
@section('head')
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('main-content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card mt-2 card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="{{Storage::url($product->image)}}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{
                $product->name}}</h3>
              <p>{!!$product->description!!}</p>

              <hr>
              <h4>Specification</h4>
              <p>{!!$product->specification!!}</p>
              <h4 class="mt-3">Brand</h4>
              <p>{{$product->brand}}</p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    // Summernote
    $('#specification').summernote();
    $('#description').summernote();
  })
</script>
@endsection