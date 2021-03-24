<header>
  <div class="top-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <ul style="">
            <li class="text-white pr-3"><i class="fa fa-phone"></i> {{$setting->number}}   </li>
            <li class="text-white"><i class="fa fa-envelope"></i> {{$setting->email}}</li>
          </ul>
        </div>
        <div class="col-lg-3 d-none d-md-block">
          
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="row">
          <div class="col-lg-6 col-md-6">
          <ul>
            <li class=" pr-3"><a href="{{route('contact')}}" class="top-link">Contact</a></li>
            <li class=" pr-3"><a href="{{route('product')}}" class="top-link">Products</a></li>
            <li class=" pr-3"><a href="{{route('about')}}" class="top-link">About</a></li>
          </ul>
          </div>
          <div class="col-lg-6 col-md-5">
            <ul style="float:right;">
              @foreach($account as $link)
            <li class=" pl-2"><a href="{{$link->url}}" target="_blank" class="header-sociallink"><i class="fa fa-{{$link->name}} fa-lg"></i></a></li>
              @endforeach
          </ul>
          </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
 <div class="nav-wrapper fixed-top">
  <nav class="navbar">
    <img src="{{Storage::url($setting->logo)}}" alt="Company Logo">
    <h2 style="color: #22469e;">{{$setting->name}}</h2>
    <ul class="nav no-search">
      <li class="nav-item"><a href="/">Home</a></li>
      <li class="nav-item"><a href="{{route('about')}}">About</a></li>
      <li class="nav-item"><a href="{{route('product')}}">Products</a></li>
      <li class="nav-item"><a href="{{route('contact')}}">Contact</a></li>
    </ul>
    <div class="menu-toggle" id="mobile-menu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>
  </nav>
  </div>
</header>