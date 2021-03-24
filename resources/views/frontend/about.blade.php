@extends('frontend.layout.master')
@section('head')
<title>{{$pages->title}}</title>
<meta name="descripton" content="{{$pages->meta_description}}">
<meta name="keywords" content="{{$pages->meta_keyword}}">
@endsection
@section('main-content')
<section>
      <div class="container-fluid bg-overlay" style="    background: linear-gradient(rgb(34 70 158), rgba(0,0,0,.7)), url('{{Storage::url($pages->image)}}');
      background-repeat: no-repeat;
      background-size: cover;background-position: center center;

">
        <div class="row text-center">
          <div class="col-md-12">
            <h1 class="text-center">About Us</h1>
          </div>
        </div>
      </div>
</section>
<section class="about-content p-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img alt="about-image" src="{{Storage::url($about->image)}}" style="margin-top: 80px;" class="w-100">
          </div>
          <div class="col-md-6" id="one">
            <h2 class=" about-heading ">About us</h2>
            <p>{!!$about->description!!}
            </p>
          </div>
          <div class="col-md-12" id="two">

          </div>
        </div>
      </div>
    </section>
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
@endsection

@section('script')
<script>
var first=document.getElementById('one');
var second=document.getElementById('two');
var third=first.innerHTML.split('.');
var text='';
var count=third.length;
for(i=0;i<3;i++)
{
text+=third[i]+'.';
first.innerHTML=text;
}
text='';
for(i=3;i<count;i++)
{
text+=third[i]+'.';
second.innerHTML=text;
}
</script>
@endsection