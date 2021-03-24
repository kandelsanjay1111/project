<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 ">
          <p class="footer-text">Our Company</p>
          <div class="footer-content">
           {!!Str::limit($about->description,60)!!}
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <p class="footer-text">Other Links</p>
          <ul>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            <li><a href="{{route('product')}}">Products</a></li>
          </ul>
         </div>
        <div class="col-lg-3 col-md-6">
          <p class="footer-text">Address</p>
          
            <ul>
              <li><i class="fa fa-home fa-x pr-2"></i>{{$setting->location}}</li>
              <li><i class="fa fa-phone fa-x pr-2"></i>{{$setting->number}}</li>
            </ul> 
         
        </div>
        <div class="col-lg-3 col-md-6">
          <p class="footer-text">Social Links</p>
          <ul>
            @foreach($account as $account)
            <li style="text-transform: capitalize;"><a href="{{$account->url}}" target="_blank"><i class="fa fa-{{$account->name}} fa-x pr-2"></i></a>{{$account->name}}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    
      <div class="footer-bottom pb-2">
      	<p class="text-center pt-3 text-white">Copyright © 2021 {{$setting->name}} All Rights Reserved.</p>
	  </div>
    
</footer>