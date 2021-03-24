  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-indigo">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/rawal.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rawal Traders</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{request()->segment(2)=='home'? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user')}}" class="nav-link {{request()->segment(2)=='user'? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link {{request()->segment(2)=='products'? 'active' : ''}}">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link {{request()->segment(2)=='services'? 'active' : ''}}">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('testimonials.index')}}" class="nav-link {{request()->segment(2)=='testimonials'? 'active' : ''}}">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Testimonials
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('carousels.index')}}" class="nav-link {{request()->segment(2)=='carousels'? 'active' : ''}}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Carousels
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('clients.index')}}" class="nav-link {{request()->segment(2)=='clients'? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('messages.index')}}" class="nav-link {{request()->segment(2)=='messages'? 'active' : ''}}">
              <i class="nav-icon fas fa-envelope-square"></i>
              <p>
                Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('accounts.index')}}" class="nav-link {{request()->segment(2)=='accounts'? 'active' : ''}}">
              <i class="nav-icon fab fa-facebook-square"></i>
              <p>
                Social Accounts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('page.index')}}" class="nav-link {{request()->segment(2)=='page'? 'active' : ''}}">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Page
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('setting')}}" class="nav-link {{request()->segment(2)=='setting'? 'active' : ''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Page Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();" class="nav-link">
              <form action="{{route('logout')}}" id="logout" method="POST">
                @csrf
                <input type="hidden" name="logout">
              </form>
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
