@extends('frontend.layout.master')
@section('head')
<title>{{$page->title}}</title>
<meta name="descripton" content="{{$page->meta_description}}">
<meta name="keywords" content="{{$page->meta_keyword}}">
@endsection
@section('main-content')

<section class="carousel-section">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
      @foreach($carousel as $carousel)
      <div class="carousel-item {{($loop->index==0) ? 'active' : ''}}">
        <div class="carousel-content">
          <div data-aos="fade-up">
          <h2>{{$carousel->title}}</h2>
          </div>
          <div data-aos="fade-down">
          <p>{{$carousel->description}}</p>    
          </div>
        </div>
        <img class="d-block w-100" src="{{Storage::url($carousel->image)}}" alt="First slide">
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</section>

<section class="product-section pb-5">
  <div class="container-fluid">
    <div>
      <h2 class="section-heading">Products</h2>
    </div>
    <div class="my-carousel owl-carousel owl-theme">
      @foreach($products as $product)
      <div class="item">
        <div class="card product-card" style="background-image:url({{asset(Storage::url($product->image))}}); background-size:cover; width:400px;">
              <div class="product-overlay">
                
              </div>
              <div class="product-content ">
                <a href="{{route('product.show',$product->slug)}}" class="custom-button ml-3">Detail</a>
                <p class="product-title text-center">Product Name</p>
              </div>
              
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="service-section" >
  <div class="container-fluid">
    <div>
      <h2 class="section-heading text-center text-white">Our Services</h2>
    </div>
    <div class="row">
      @foreach($services as $service)
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card service-card mb-3  text-white">
        <img class="card-img service-img" src="{{asset(Storage::url($service->image))}}" alt="Card image">
        <div class="card-img-overlay service-overlay d-flex flex-column">
            <h3 class="card-text service-card-text font-weight-bold"><span class="mr-auto">{{$service->title}}</span></h3>
            <div class="service-subtitle">{{$service->description}}</div>
        </div>
      </div>
    </div>
    @endforeach
      
    </div>
  </div>
</section>
<section class="testimonial-section">
  <div class="container">
    <div>
      <h2 class="section-heading text-white">What our client say about us</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
              @foreach($testimonials as $testimonial)
                <div class="testimonial">
                    <div class="pic">
                        <img src="{{Storage::url($testimonial->image)}}" class="h-100">
                    </div>
                    <p class="description">
                        {{$testimonial->description}}
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">{{$testimonial->name}}</h3>
                        <span class="post">{{$testimonial->post}}</span>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
</section>

@if(count($clients))
<section id="clients" class="section-bg client-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-heading">Our CLients</h2>
        </div>
        <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          @foreach($clients as $client)
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo"> <img src="{{Storage::url($client->image)}}" class="img-fluid" alt=""> </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
@endif
@endsection