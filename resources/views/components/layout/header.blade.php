<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="{{--collapse--}} navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  collapse">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.html">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.html">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            
            @guest
              <a href="{{route('login')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              </a>
              <a href="{{route('register')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Register
                </span>
              </a>
            @endguest
            @auth
              <a href="{{route('dashboard')}}">
                <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span>
                  Dashboard
                </span>
              </a>
              <a href="{{route('logoff')}}" >
                <i class="fa fa-power-off" aria-hidden="true"></i>
              </a>
              <a href="{{route('cart')}}">Cart
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              {{$countCart}}
              </a>
              <a href="{{route('user_orders')}}">Order
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              {{$countOrder}}
              </a>
            @endauth
            
            <form class="form-inline" >
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
</div>