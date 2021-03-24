@extends('frontend.layout.master')
@section('head')
<title>{{$pages->title}}</title>
<meta name="descripton" content="{{$pages->meta_description}}">
<meta name="keywords" content="{{$pages->meta_keyword}}">
@endsection
@section('main-content')
<section>
	    	<div class="container-fluid bg-overlay" style="background: linear-gradient(rgb(34 70 158), rgba(0,0,0,.7)), url('{{Storage::url($pages->image)}}');
      background-repeat: no-repeat;
      background-size: cover;background-position: center center;

">
		        <div class="row text-center">
		          <div class="col-md-12">
		            <h1 class="text-center">Our Products</h1>
		          </div>
		        </div>
      		</div>
</section>
<section class="product-section">
	<div class="container-fluid">
		<div class="row">
      @foreach($products as $product)
			<div class="col-lg-4 col-md-6">
				<div class="card product-card mb-5" style="background-image:url({{Storage::url($product->image)}}); background-size:cover;">
              <div class="product-overlay">
                
              </div>
              <div class="product-content ">
                <a href="{{route('product.show',$product->slug)}}" class="custom-button ml-3">Detail</a>
                <p class="product-title text-center">{{$product->name}}</p>
              </div>
              
          </div>
			</div>
      @endforeach
		</div>
	</div>
</section>
@endsection