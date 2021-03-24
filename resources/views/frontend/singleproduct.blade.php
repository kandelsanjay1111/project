@extends('frontend.layout.master')
@section('head')
<title>{{$pages->title}}</title>
<meta name="descripton" content="{{$pages->meta_description}}">
<meta name="keywords" content="{{$pages->meta_keyword}}">
@endsection
@section('main-content')
<section class="single-product">
  <div class="container">
    <div class="row">
      <div class="col-md-5 mt-5">
        <div class="card bg-light">
          <img class="card-img-top" src="{{Storage::url($product->image)}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-7 mt-5 single-product-content">
        <div class="card" style="border:none;">
          <div class="card-body">
            <h2>{{$product->name}}</h2>
            <p><span class="single-product-title">Brand:</span>{{$product->brand}}</p>
            <p><span class="single-product-title">Description:</span>
          </p>
          <p>{!!$product->description!!}</p>
          <p class="single-product-title">Specification
        </p>
        <p>{!!$product->specification!!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="product-section pb-5">
  <div class="container-fluid">
    <div>
      <h2 class="section-heading">Related Products</h2>
    </div>
    <div class="my-carousel owl-carousel owl-theme">
      @foreach($relatedproducts as $products)
      <div class="item">
        <div class="card product-card" style="background-image:url({{Storage::url($products->image)}}); background-size:cover; width:400px;">
              <div class="product-overlay">
                
              </div>
              <div class="product-content ">
                <a href="{{route('product.show',$products->slug)}}" class="custom-button ml-3">Detail</a>
                <p class="product-title text-center">{{$products->name}}</p>
              </div>
              
          </div>
        </div>
        @endforeach
    </div>
  </div>
</section>
@endsection