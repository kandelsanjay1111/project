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
            <h1 class="text-center">Contact Us</h1>
          </div>
        </div>
      </div>
</section>
<section class="contact-content">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="contacts">
              <div class="contact-list">
                <span class="contact-icon"><i class="fa fa-map-marker"></i></span>
                <div class="contact-item">
                  <h2>Location</h2>
                  <p>{{$setting->location}}</p> 
                </div>
              </div>
              <div class="contact-list">
                <span class="contact-icon"><i class="fa fa-phone"></i></span>
                <div class="contact-item">
                  <h2>Phone No.</h2>
                  <p>{{$setting->number}}</p>
                </div>
              </div>
              <div class="contact-list">
                <span class="contact-icon"><i class="fa fa-envelope"></i></span>
                <div class="contact-item">
                  <h2>Email</h2>
                  <p>{{$setting->email}}</p> 
                </div>
              </div>
            </div>
            <div class="contacts">
              
            </div>
            <div class="contacts">
              
            </div>
          </div>

          <div class="col-md-7">
            @include('admin.notify')
            <form action="{{route('contacts.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="form-row">
                  <div class="col-6">
                    <input type="text"  name="firstname" class="form-control @error('firstname')
                      is-invalid @enderror" placeholder="First name">
                    @error('firstname')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>
                  <div class="col-6">
                    <input type="text" name="lastname" class="form-control @error('lastname')
                      is-invalid @enderror" placeholder="Last name">
                    @error('lastname')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
                  </div>
                </div> 
              </div>

              <div class="form-group">
                    <input name="email" type="email" class="form-control @error('email')
                      is-invalid @enderror" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
              </div>

              <div class="form-group">
                <textarea name="message" class="form-control @error('message')
                      is-invalid @enderror" placeholder="message"></textarea>
                @error('message')
                        <span class="invalid-feedback">{{$message}} </span>           
                      @enderror
              </div>

              <div class="form-group">
                <button type="Submit" class="custom-button">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</section>
	<section>
		    <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14061.966191238658!2d81.3289389!3d28.22275655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1610858647018!5m2!1sen!2snp" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		      
	</section>
@endsection('main-content')